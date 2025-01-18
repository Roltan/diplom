<?php

namespace App\Services;

use App\Http\Requests\Quest\CreateQuestRequest;
use App\Http\Resources\Test\BlankResource;
use App\Http\Resources\Test\ChoiceResource;
use App\Http\Resources\Test\FillResource;
use App\Http\Resources\Test\RelationResource;
use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\RelationQuest;
use Illuminate\Http\Response;
use App\Repositories\TopicRepository;

class QuestCreationService
{
    public function create(CreateQuestRequest $request): Response
    {
        $topic = TopicRepository::getByName($request->topic);
        if ($topic === null) {
            return response(['status' => false, 'error' => 'Тема не найдена'], 404);
        }

        $model = $this->createQuestionByType($request->type, $request, $topic->id);

        if ($model instanceof Response)
            return $model;

        return response(['status' => true, 'quest' => $model]);
    }

    protected function createQuestionByType(string $type, CreateQuestRequest $request, int $topicId): mixed
    {
        return match ($type) {
            'fill' => new FillResource($this->createFill($topicId, $request->quest)),
            'blank' => new BlankResource($this->createBlankQuestion($request, $topicId)),
            'choice' => new ChoiceResource($this->createChoiceQuestion($request, $topicId)),
            'relation' => new RelationResource($this->createRelationQuestion($request, $topicId)),
            default => response(['status' => false, 'error' => 'unknown type'], 400),
        };
    }

    protected function createFill(int $topic, string $quest): FillQuest
    {
        $removedTags = $this->extractTagsFromQuest($quest);
        $processedQuest = $this->replaceTagsInQuest($quest, $removedTags);

        return FillQuest::create([
            'quest' => $processedQuest,
            'options' => json_encode($removedTags),
            'topic_id' => $topic,
        ]);
    }

    protected function createBlankQuestion(CreateQuestRequest $request, int $topicId): BlankQuest
    {
        $data = $request->only(['quest', 'correct']);
        $data['correct'] = json_encode($data['correct']);
        return BlankQuest::create($data + ['topic_id' => $topicId]);
    }

    protected function createChoiceQuestion(CreateQuestRequest $request, int $topicId): ChoiceQuest
    {
        $data = $request->only(['quest', 'correct', 'uncorrect']);
        if (count($data['correct']) > 1)
            $data['is_multiple'] = true;

        $data['correct'] = json_encode($data['correct']);
        $data['uncorrect'] = json_encode($data['uncorrect']);

        return ChoiceQuest::create($data + ['topic_id' => $topicId]);
    }

    protected function createRelationQuestion(CreateQuestRequest $request, int $topicId): RelationQuest
    {
        $data = $request->only(['quest', 'first_column', 'second_column']);
        $data['first_column'] = json_encode($data['first_column']);
        $data['second_column'] = json_encode($data['second_column']);
        return RelationQuest::create($data + ['topic_id' => $topicId]);
    }

    protected function extractTagsFromQuest(string $quest): array
    {
        $pattern = '/<([^>]+)>/';
        $removedTags = [];
        $counter = 0;

        preg_replace_callback($pattern, function ($matches) use (&$counter, &$removedTags) {
            $tagContent = explode(';', $matches[1]);
            $formattedTag = array_map(function ($index, $str) {
                return [
                    'str' => $str,
                    'correct' => $index === 0,
                ];
            }, array_keys($tagContent), $tagContent);

            $removedTags[] = $formattedTag;
            return 's?:' . $counter++;
        }, $quest);

        return $removedTags;
    }

    protected function replaceTagsInQuest(string $quest, array &$removedTags): string
    {
        $pattern = '/<([^>]+)>/';
        $counter = 0;

        return preg_replace_callback($pattern, function ($matches) use (&$counter) {
            return 's?:' . $counter++;
        }, $quest);
    }
}
