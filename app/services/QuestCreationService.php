<?php

namespace App\Services;

use App\Http\Requests\Quest\CreateQuestRequest;
use App\Http\Resources\Quest\BlankResource;
use App\Http\Resources\Quest\ChoiceResource;
use App\Http\Resources\Quest\FillResource;
use App\Http\Resources\Quest\RelationResource;
use App\Models\BlankQuest;
use App\Models\ChoiceQuest;
use App\Models\FillQuest;
use App\Models\RelationQuest;
use App\Repositories\DifficultyRepository;
use Illuminate\Http\Response;
use App\Repositories\TopicRepository;
use Illuminate\Http\Request;

class QuestCreationService
{
    public function create(CreateQuestRequest $request): Response
    {
        $topic = TopicRepository::getByName($request->topic);
        if ($topic === null)
            return response(['status' => false, 'error' => 'Тема не найдена'], 404);

        $model = $this->createQuestionByType($request->type, $request, $topic->id);

        if ($model instanceof Response)
            return $model;

        return response(['status' => true, 'quest' => $model]);
    }

    protected function createQuestionByType(string $type, Request $request, int $topicId): mixed
    {
        return match ($type) {
            'fill' => new FillResource($this->createFill($topicId, $request->quest)),
            'blank' => new BlankResource($this->createBlankQuestion($request, $topicId)),
            'choice' => new ChoiceResource($this->createChoiceQuestion($request, $topicId)),
            'relation' => new RelationResource($this->createRelationQuestion($request, $topicId)),
            default => response(['status' => false, 'error' => 'unknown type'], 400),
        };
    }

    protected function createFill(int $topic, Request $request): FillQuest
    {
        $quest = $request->quest;
        $removedTags = $this->extractTagsFromQuest($quest);
        $processedQuest = $this->replaceTagsInQuest($quest, $removedTags);
        $difficulty = DifficultyRepository::getRangeByTitle($request->difficulty)['max_value'];

        return FillQuest::create([
            'quest' => $processedQuest,
            'options' => json_encode($removedTags),
            'topic_id' => $topic,
            'difficulty' => $difficulty
        ]);
    }

    protected function createBlankQuestion(Request $request, int $topicId): BlankQuest
    {
        $difficulty = DifficultyRepository::getRangeByTitle($request->difficulty)['max_value'];
        return BlankQuest::create([
            'quest' => $request->quest,
            'correct' => json_encode($request->correct),
            'topic_id' => $topicId,
            'difficulty' => $difficulty
        ]);
    }

    protected function createChoiceQuestion(Request $request, int $topicId): ChoiceQuest
    {
        $difficulty = DifficultyRepository::getRangeByTitle($request->difficulty)['max_value'];
        return ChoiceQuest::create([
            'quest' => $request->quest,
            'correct' => json_encode($request->correct),
            'uncorrect' => json_encode($request->uncorrect),
            'topic_id' => $topicId,
            'is_multiple' => count($request->correct) > 1,
            'difficulty' => $difficulty
        ]);
    }

    protected function createRelationQuestion(Request $request, int $topicId): RelationQuest
    {
        $difficulty = DifficultyRepository::getRangeByTitle($request->difficulty)['max_value'];
        return RelationQuest::create([
            'quest' => $request->quest,
            'first_column' => json_encode($request->first_column),
            'second_column' => json_encode($request->second_column),
            'topic_id' => $topicId,
            'difficulty' => $difficulty
        ]);
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
