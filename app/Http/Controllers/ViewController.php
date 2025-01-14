<?php

namespace App\Http\Controllers;

use App\Http\Requests\Test\GenerateTestRequest;
use App\Services\ViewServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ViewController extends Controller
{
    public  function __construct(
        public ViewServices $viewServices
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
        return $this->viewServices->viewTest($alias);
    }

    public function viewSolvedTest(int $solvedId): RedirectResponse|View
    {
        return $this->viewServices->viewSolvedTest($solvedId);
    }

    public function viewMySolvedTest(int $testId): RedirectResponse|View
    {
        return $this->viewServices->viewMySolvedTest($testId);
    }

    public function generateTest(GenerateTestRequest $request): RedirectResponse|View
    {
        return $this->viewServices->generateTest($request);
    }
}
