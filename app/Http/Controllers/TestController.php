<?php

namespace App\Http\Controllers;

use App\Http\Requests\Test\CreateTestRequest;
use App\Http\Requests\Test\GenerateTestRequest;
use App\Http\Resources\Test\TestResource;
use App\Services\GenerateServices;
use App\Services\TestServices;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestController extends Controller
{
    public function __construct(
        public GenerateServices $generateServices,
        public TestServices $testServices
    ) {}

    public function getTest(string $alias): Response|TestResource
    {
        return $this->testServices->getTest($alias);
    }

    public function generateTest(GenerateTestRequest $request): Response
    {
        return $this->generateServices->generateTest($request);
    }

    public function create(CreateTestRequest $createTestRequest): Response|ResponseFactory
    {
        return $this->testServices->createTest($createTestRequest);
    }

    public function delete(int $id): Response|ResponseFactory
    {
        return $this->testServices->deleteTest($id);
    }
}
