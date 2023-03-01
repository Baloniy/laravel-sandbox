<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function generateNewLink()
    {
        /** @var User $user */
        $user = Auth::user();

        $user->link = hash('sha256', Str::random());
        $user->link_expires_at = (new Carbon())->addWeek();
        $user->save();

        return redirect()->route('game.index', ['link' => $user->link]);
    }

    public function deactivateLink()
    {
        /** @var User $user */
        $user = Auth::user();

        $user->link_expires_at = null;
        $user->save();

        return redirect()->route('register');
    }
}
