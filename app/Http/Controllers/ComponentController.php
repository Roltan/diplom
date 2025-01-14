<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quest\CreateQuestRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Quest\GenerateQuestRequest;

class ComponentController extends Controller
{
    public function __construct(
        public QuestController $questController
    ) {}

    public function reGenerate(GenerateQuestRequest $generateQuestRequest): RedirectResponse|View
    {
        $response = $this->questController->reGenerate($generateQuestRequest);
        if ($response->status() != 200) {
            return redirect('/')->with('error', $response->original['error']);
        }
        $quest = $response->original['quest'];

        return view('elements/quest/edit', $quest);
    }

    public function create(CreateQuestRequest $createQuestRequest)
    {
        $response = $this->questController->create($createQuestRequest);
        if ($response->status() != 200) {
            return redirect('/')->with('error', $response->original['error']);
        }
        $quest = $response->original['quest'];
        $quest = json_decode(json_encode($quest), true);

        return view('elements/quest/edit', $quest);
    }
}
