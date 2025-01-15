<?php

namespace App\Services;

use App\Http\Requests\Quest\GenerateQuestRequest;
use App\Http\Resources\Test\BlankResource;
use App\Http\Resources\Test\ChoiceResource;
use App\Http\Resources\Test\FillResource;
use App\Http\Resources\Test\RelationResource;
use Illuminate\Http\Response;
use App\Repositories\FillQuestRepository;
use App\Repositories\BlankQuestRepository;
use App\Repositories\ChoiceQuestRepository;
use App\Repositories\RelationQuestRepository;

class QuestGenerationService
{
    public function __construct(
        private FillQuestRepository $fillQuestRepository,
        private BlankQuestRepository $blankQuestRepository,
        private ChoiceQuestRepository $choiceQuestRepository,
        private RelationQuestRepository $relationQuestRepository,
    ) {}

    public function reGenerate(GenerateQuestRequest $request): Response
    {
        $type = $this->determineQuestionType($request);
        $quest = $this->getUniqueQuestion($type, $request->topic, $request->ids ?? []);

        if ($quest instanceof Response) {
            return $quest;
        }

        return response(ViewServices::convertObjectsToArray(['status' => true, 'quest' => $quest]));
    }

    protected function determineQuestionType(GenerateQuestRequest $request): string
    {
        $types = ['fill', 'blank', 'choice', 'relation'];
        return $request->has('type') ? $request->type : $types[array_rand($types)];
    }

    protected function getUniqueQuestion(string $type, string $topic, array $excludeIds = []): mixed
    {
        $quest = $this->switchQuest($type, $topic);

        if ($quest instanceof Response) {
            return $quest;
        }

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

        if ($question instanceof Response) {
            return $question;
        }

        return $this->wrapQuestionInResource($type, $question);
    }

    protected function getQuestionByType(string $type, string $topic): mixed
    {
        return match ($type) {
            'fill' => $this->fillQuestRepository->getRandomByTopic($topic),
            'blank' => $this->blankQuestRepository->getRandomByTopic($topic),
            'choice' => $this->choiceQuestRepository->getRandomByTopic($topic),
            'relation' => $this->relationQuestRepository->getRandomByTopic($topic),
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
