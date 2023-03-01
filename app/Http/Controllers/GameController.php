<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Services\GameService;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index(string $link)
    {
        /** @var User $user */
        $user = User::where('link', $link)->first();

        if (!$user || $user->linkExpired()) {
            return redirect()->route('register');
        }

        return view('game');
    }

    public function play(GameService $gameService)
    {
        $result = $gameService->play();

        return view('game', $result);
    }

    public function history()
    {
        $games = Game::where('user_id', Auth::id())
            ->latest()
            ->take(3)
            ->get();

        return view('history', ['games' => $games]);
    }
}
