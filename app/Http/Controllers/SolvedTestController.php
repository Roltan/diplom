<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveSolvedRequest;
use App\Models\SolvedTest;
use App\Services\SolvedTestServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class SolvedTestController extends Controller
{
    public function __construct(
        public SolvedTestServices $solvedTestServices
    ) {}

    public function saveSolvedTest(SaveSolvedRequest $request): Response
    {
        return $this->solvedTestServices->saveSolvedTest($request);
    }

    public function getMySolvedTest(int $testId): Collection|Response
    {
        return $this->solvedTestServices->getSolvedTest($testId, Auth::user()->id);
    }

    public function getSolvedTest(int $solvedId): Collection|Response
    {
        $solved = SolvedTest::find($solvedId);
        if ($solved == null)
            return response(['status' => false, 'error' => 'solved not found'], 404);

        return $this->solvedTestServices->getSolvedTest($solved->id);
    }
}
