<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ViewServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public  function __construct(
        public ViewServices $viewServices
    ) {}

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
}
