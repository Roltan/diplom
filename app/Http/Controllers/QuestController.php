<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quest\CreateQuestRequest;
use App\Http\Requests\Quest\GenerateQuestRequest;
use Illuminate\Http\Response;
use App\Services\QuestCreationService;
use App\Services\QuestGenerationService;

class QuestController extends Controller
{
    public function __construct(
        public QuestGenerationService $questGenerationService,
        public QuestCreationService $questCreationService
    ) {}

    public function reGenerate(GenerateQuestRequest $generateQuestRequest): Response
    {
        return $this->questGenerationService->reGenerate($generateQuestRequest);
    }

    public function create(CreateQuestRequest $createQuestRequest): Response
    {
        return $this->questCreationService->create($createQuestRequest);
    }
}
