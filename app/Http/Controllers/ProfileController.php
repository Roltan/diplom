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

    public function viewCreate(): RedirectResponse|View
    {
        $data = $this->viewServices->viewCreate();
        if (is_string($data))
            return redirect('/')->with('error', $data);
        return view('profile-create', $data);
    }

    public function viewProfile(): RedirectResponse|View
    {
        $data = $this->viewServices->viewProfile();
        if (is_string($data))
            return redirect('/')->with('error', $data);
        return view('profile', $data);
    }

    public function viewSolved(Request $request): RedirectResponse|View
    {
        $data = $this->viewServices->viewSolved($request);
        if (is_string($data))
            return redirect('/')->with('error', $data);
        return view('profile-solved', $this->convertObjectsToArray($data));
    }

    public function viewStatistic(Request $request): RedirectResponse|View
    {
        $data = $this->viewServices->viewStatistic($request);
        if (is_string($data))
            return redirect('/')->with('error', $data);
        return view('profile-statistic', $this->convertObjectsToArray($data));
    }

    public function viewTests(Request $request): RedirectResponse|View
    {
        $data = $this->viewServices->viewTests($request);
        if (is_string($data))
            return redirect('/')->with('error', $data);
        return view('profile-test', $this->convertObjectsToArray($data));
    }
}
