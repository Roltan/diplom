<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quest\CreateQuestRequest;
use App\Http\Requests\Quest\GenerateQuestRequest;
use App\Services\QuestServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\Test\BlankResource;
use App\Http\Resources\Test\ChoiceResource;
use App\Http\Resources\Test\FillResource;
use App\Http\Resources\Test\RelationResource;

class QuestController extends Controller
{
    public function __construct(
        public QuestServices $questServices
    ) {}

    public function reGenerate(GenerateQuestRequest $generateQuestRequest): Response
    {
        return $this->questServices->reGenerate($generateQuestRequest);
    }

    public function create(CreateQuestRequest $createQuestRequest): Response
    {
        return $this->questServices->create($createQuestRequest);
    }
}
