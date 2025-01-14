<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegRequest;
use App\Services\AuthServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(
        public AuthServices $authServices
    ) {}

    public function login(LoginRequest $loginRequest): Response
    {
        return $this->authServices->login($loginRequest);
    }

    public function logout(): RedirectResponse
    {
        return $this->authServices->logout();
    }

    public function register(RegRequest $regRequest): Response
    {
        return $this->authServices->register($regRequest);
    }
}
