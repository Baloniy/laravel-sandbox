<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthService
{
    public function register(array $data): User
    {
        return User::create([
            'username' => $data['username'],
            'phone' => $data['phone'],
            'password' => bcrypt(Str::random(10)),
            'link' => hash('sha256', Str::random()),
            'link_expires_at' => (new Carbon())->addWeek()
        ]);
    }

    public function login(Request $request): User
    {
        /** @var User $user */
        $user = User::where('username', $request->get('username'))->first();

        Auth::login($user);

        $request->session()->regenerate();

        return $user;
    }

    public function logout(Request $request): void
    {
        Auth::guard()->logout();

        $request->session()->invalidate();
    }
}
