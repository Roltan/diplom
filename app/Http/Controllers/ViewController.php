<?php

namespace App\Http\Controllers;

use App\Http\Requests\Test\GenerateTestRequest;
use App\Services\ViewServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Services\GenerateServices;
use App\Services\TestServices;
use App\Services\SolvedTestServices;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public  function __construct(
        public ViewServices $viewServices,
        public SolvedTestServices $solvedTestServices,
        public GenerateServices $generateServices,
        public TestServices $testServices
    ) {}

    public function viewIndex(): View
    {
        return $this->viewServices->viewIndex();
    }

    public function viewCreate(): View
    {
        return $this->viewServices->viewCreate();
    }

    public function viewProfile(): RedirectResponse|View
    {
        return $this->viewServices->viewProfile();
    }

    public function viewSolved(Request $request): RedirectResponse|View
    {
        return $this->viewServices->viewSolved($request);
    }

    public function viewStatistic(Request $request): RedirectResponse|View
    {
        return $this->viewServices->viewStatistic($request);
    }

    public function viewTest(string $alias): RedirectResponse|View
    {
        $test = $this->testServices->getTest($alias);
        if ($test->status() != 200)
            return redirect('/')->with('error', $test->original['error']);
        $test = $test->json();

        return view('test', ViewServices::convertObjectsToArray($test));
    }

    public function viewSolvedTest(int $solvedId): RedirectResponse|View
    {
        $response = $this->solvedTestServices->getSolvedTest($solvedId);
        if ($response->status() != 200)
            return redirect('/')->with('error', $response->original['error']);
        $response = $response->original;

        return view('solved', ViewServices::convertObjectsToArray($response));
    }

    public function viewMySolvedTest(int $testId): RedirectResponse|View
    {
        $response = $this->solvedTestServices->getSolvedTest($testId, Auth::user()->id);
        if ($response->status() != 200)
            return redirect('/')->with('error', $response->original['error']);
        $response = $response->original;

        return view('solved', ViewServices::convertObjectsToArray($response));
    }

    public function generateTest(GenerateTestRequest $request): RedirectResponse|View
    {
        $response = $this->generateServices->generateTest($request);
        if ($response->status() != 200)
            return redirect('/')->with('error', $response->original['error']);
        $response = $response->original;

        return view('edit', ViewServices::convertObjectsToArray($response));
    }
}
