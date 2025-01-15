<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quest\CreateQuestRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Quest\GenerateQuestRequest;
use App\Services\QuestCreationService;
use App\Services\QuestGenerationService;

class ComponentController extends Controller
{
    public function __construct(
        public QuestGenerationService $questGenerationService,
        public QuestCreationService $questCreationService
    ) {}

    public function reGenerate(GenerateQuestRequest $generateQuestRequest): RedirectResponse|View
    {
        $response = $this->questGenerationService->reGenerate($generateQuestRequest);
        if ($response->status() != 200)
            return redirect('/')->with('error', $response->original['error']);
        $quest = $response->original['quest'];

        return view('elements/quest/edit', $quest);
    }

    public function create(CreateQuestRequest $createQuestRequest): RedirectResponse|View
    {
        $response = $this->questCreationService->create($createQuestRequest);
        if ($response->status() != 200)
            return redirect('/')->with('error', $response->original['error']);
        $quest = $response->original['quest'];
        $quest = json_decode(json_encode($quest), true);

        return view('elements/quest/edit', $quest);
    }
}
