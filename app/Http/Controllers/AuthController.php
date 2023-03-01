<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $auth
    ) {
    }

    public function showRegistrationForm(Request $request)
    {
        if (Auth::user()) {
            $this->auth->logout($request);
        }

        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->auth->register($request->except(['_token']));

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('game.index', ['link' => $user->link]);
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = $this->auth->login($request);

        return redirect()->route('game.index', ['link' => $user->link]);
    }

    public function logout(Request $request)
    {
        $this->auth->logout($request);

        return redirect()->route('login.form');
    }
}
