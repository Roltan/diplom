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
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TestPageController extends Controller
{
    public  function __construct(
        public TestServices $testServices,
        public SolvedTestServices $solvedTestServices,
        public GenerateServices $generateServices,
    ) {}

    public function viewTest(string $alias): RedirectResponse|View
    {
        $test = $this->testServices->getTest($alias);
        if ($test instanceof Response)
            return redirect('/')->with('error', $test->original['error']);

        return view('test', ViewServices::convertObjectsToArray($test));
    }

    public function viewSolvedTest(int $solvedId): RedirectResponse|View
    {
        $response = $this->solvedTestServices->getSolvedTest($solvedId);
        if ($response instanceof Response)
            return redirect('/')->with('error', $response->original['error']);

        return view('solved', ViewServices::convertObjectsToArray($response));
    }

    public function viewMySolvedTest(int $testId): RedirectResponse|View
    {
        $response = $this->solvedTestServices->getSolvedTest($testId, Auth::user()->id);
        if ($response instanceof Response)
            return redirect('/')->with('error', $response->original['error']);

        return view('solved', ViewServices::convertObjectsToArray($response));
    }

    public function viewTestSettings(string $alias): RedirectResponse|View
    {
        $test = $this->testServices->getTest($alias);
        if ($test instanceof Response)
            return redirect('/')->with('error', $test->original['error']);

        // dd(ViewServices::convertObjectsToArray($test));
        return view('edit', ViewServices::convertObjectsToArray($test));
    }

    public function generateTest(GenerateTestRequest $request): RedirectResponse|View
    {
        $response = $this->generateServices->generateTest($request);
        if ($response->status() != 200)
            return redirect('/')->with('error', $response->original['error']);
        $response = $response->original;

        return view('create', ViewServices::convertObjectsToArray($response));
    }
}
