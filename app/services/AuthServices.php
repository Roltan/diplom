<?php

namespace App\Services;

use App\Http\Requests\Auth\EmailRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;

class AuthServices
{
    public function login(LoginRequest $request): Response
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request['password']
        ];

        if (!Auth::validate($credentials)) {
            return response(['status' => false, 'message' => 'Неверные данные'], 400);
        }

        // вход
        Auth::login(Auth::getProvider()->retrieveByCredentials($credentials));

        return response(['status' => true], 200);
    }

    public function logout(): RedirectResponse
    {
        // if (Auth::user() == null)
        // return response(['status' => false, 'error' => 'You are not logged in']);
        Auth::logout();
        return redirect('/');
    }

    public function register(RegRequest $request): Response
    {
        $user = user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
        ]);

        Auth::login($user);
        return response(['status' => true], 200);
    }

    public function forgot(EmailRequest $request): Response
    {
        $user = User::query()
            ->where('email', $request->email)
            ->first();

        if ($user == null)
            return response(['status' => false, 'message' => 'Неверная почта'], 404);

        $token = app('auth.password.broker')->createToken($user);

        $resetLink = '/password/reset/?token=' . $token;

        Mail::to($user->email)->send(new PasswordResetMail($resetLink));

        return response(['status' => true]);
    }
}
