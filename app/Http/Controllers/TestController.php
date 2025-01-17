<?php

namespace App\Http\Controllers;

use App\Http\Requests\Test\CreateTestRequest;
use App\Services\TestServices;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use App\Services\SolvedTestServices;
use App\Http\Requests\SaveSolvedRequest;
use App\Http\Requests\Test\EditTestRequest;

class TestController extends Controller
{
    public function __construct(
        public TestServices $testServices,
        public SolvedTestServices $solvedTestServices
    ) {}

    public function create(CreateTestRequest $createTestRequest): Response|ResponseFactory
    {
        return $this->testServices->createTest($createTestRequest);
    }

    public function edit(EditTestRequest $request): Response
    {
        return $this->testServices->editTest($request);
    }

    public function saveSolvedTest(SaveSolvedRequest $request): Response
    {
        return $this->solvedTestServices->saveSolvedTest($request);
    }
}
