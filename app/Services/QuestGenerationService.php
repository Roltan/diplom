<?php

namespace App\Services;

use App\Http\Requests\Quest\GenerateQuestRequest;
use App\Http\Resources\Quest\BlankResource;
use App\Http\Resources\Quest\ChoiceResource;
use App\Http\Resources\Quest\FillResource;
use App\Http\Resources\Quest\RelationResource;
use Illuminate\Http\Response;
use App\Repositories\QuestRepository;
use App\Repositories\TopicRepository;

class QuestGenerationService
{
    public function reGenerate(GenerateQuestRequest $request): Response
    {
        $topic = TopicRepository::getByName($request->topic);
        if ($topic === null)
            return response(['status' => false, 'error' => 'Тема не найдена'], 404);

        $type = $this->determineQuestionType($request);
        $quest = $this->getUniqueQuestion(
            $type,
            $topic->id,
            $request->ids ?? [],
            $request->difficulty
        );

        if ($quest instanceof Response)
            return $quest;

        return response(['status' => true, 'quest' => $quest]);
    }

    protected function determineQuestionType(GenerateQuestRequest $request): string
    {
        $types = ['fill', 'blank', 'choice', 'relation'];
        return $request->has('type') ? $request->type : $types[array_rand($types)];
    }

    protected function getUniqueQuestion(string $type, int $topicId, array $excludeIds = [], ?string $difficulty): mixed
    {
        $quest = $this->getQuest($type, $topicId, $difficulty);

        if ($quest instanceof Response)
            return $quest;

        while (in_array($quest->id, $excludeIds)) {
            $quest = $this->getQuest($type, $topicId, $difficulty);
            if ($quest instanceof Response) {
                return $quest;
            }
        }

        return $quest;
    }

    protected function getQuest($type, $topic, ?string $difficulty): BlankResource|ChoiceResource|FillResource|RelationResource|Response
    {
        $question = QuestRepository::getQuest($type, 1, $topic, $difficulty)->first();

        if ($question instanceof Response)
            return $question;

        return $this->wrapQuestionInResource($type, $question);
    }

    protected function wrapQuestionInResource(string $type, mixed $question): mixed
    {
        return match ($type) {
            'fill' => new FillResource($question),
            'blank' => new BlankResource($question),
            'choice' => new ChoiceResource($question),
            'relation' => new RelationResource($question),
            default => response(['status' => false, 'error' => 'unknown type quest'], 400),
        };
    }
}
