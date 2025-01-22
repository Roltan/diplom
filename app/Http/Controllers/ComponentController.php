<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quest\CreateQuestRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Quest\GenerateQuestRequest;
use App\Services\QuestCreationService;
use App\Services\QuestGenerationService;
use Illuminate\Http\Response;

class ComponentController extends Controller
{
    public function __construct(
        public QuestGenerationService $questGenerationService,
        public QuestCreationService $questCreationService
    ) {}

    public function reGenerate(GenerateQuestRequest $generateQuestRequest): Response|View
    {
        $response = $this->questGenerationService->reGenerate($generateQuestRequest);
        if ($response->status() != 200)
            return response(['status' => false, 'error' => $response->original['error'], 400]);
        $quest = $response->original['quest'];
        $quest = $this->convertObjectsToArray($quest);

        return view('elements/quest/edit', $quest);
    }

    public function create(CreateQuestRequest $createQuestRequest): Response|View
    {
        $response = $this->questCreationService->create($createQuestRequest);
        if ($response->status() != 200)
            return response(['status' => false, 'error' => $response->original['error'], 400]);
        $quest = $response->original['quest'];
        $quest = $this->convertObjectsToArray($quest);

        return view('elements/quest/edit', $quest);
    }
}
