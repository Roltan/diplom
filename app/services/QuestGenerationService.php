<?php

namespace App\Services;

use App\Http\Requests\Quest\GenerateQuestRequest;
use App\Http\Resources\Quest\BlankResource;
use App\Http\Resources\Quest\ChoiceResource;
use App\Http\Resources\Quest\FillResource;
use App\Http\Resources\Quest\RelationResource;
use Illuminate\Http\Response;
use App\Repositories\FillQuestRepository;
use App\Repositories\BlankQuestRepository;
use App\Repositories\ChoiceQuestRepository;
use App\Repositories\RelationQuestRepository;

class QuestGenerationService
{
    public function reGenerate(GenerateQuestRequest $request): Response
    {
        $type = $this->determineQuestionType($request);
        $quest = $this->getUniqueQuestion($type, $request->topic, $request->ids ?? []);

        if ($quest instanceof Response)
            return $quest;

        return response(['status' => true, 'quest' => $quest]);
    }

    protected function determineQuestionType(GenerateQuestRequest $request): string
    {
        $types = ['fill', 'blank', 'choice', 'relation'];
        return $request->has('type') ? $request->type : $types[array_rand($types)];
    }

    protected function getUniqueQuestion(string $type, string $topic, array $excludeIds = []): mixed
    {
        $quest = $this->switchQuest($type, $topic);

        if ($quest instanceof Response)
            return $quest;

        while (in_array($quest->id, $excludeIds)) {
            $quest = $this->switchQuest($type, $topic);
            if ($quest instanceof Response) {
                return $quest;
            }
        }

        return $quest;
    }

    protected function switchQuest($type, $topic): BlankResource|ChoiceResource|FillResource|RelationResource|Response
    {
        $question = $this->getQuestionByType($type, $topic);

        if ($question instanceof Response)
            return $question;

        return $this->wrapQuestionInResource($type, $question);
    }

    protected function getQuestionByType(string $type, string $topic): mixed
    {
        return match ($type) {
            'fill' => FillQuestRepository::getRandomByTopic($topic),
            'blank' => BlankQuestRepository::getRandomByTopic($topic),
            'choice' => ChoiceQuestRepository::getRandomByTopic($topic),
            'relation' => RelationQuestRepository::getRandomByTopic($topic),
            default => response(['status' => false, 'error' => 'unknown type quest'], 400),
        };
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
