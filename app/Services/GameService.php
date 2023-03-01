<?php

declare(strict_types=1);

namespace App\Services;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;

class GameService
{
    private const MIN = 0;
    private const MAX = 1000;
    public function __construct(
        private readonly GameCalculator $calculator
    ) {
    }

    public function play(): array
    {
        $number = random_int(self::MIN, self::MAX);

        $result = [
            'result' => Game::RESULT_LOSE,
            'number' => $number,
            'sum' => 0,
        ];

        if ($number % 2 !== 0) {
            $this->createGame($result);
            return $result;
        }

        $result['result'] = Game::RESULT_WIN;
        $result['sum'] = $this->calculator->calculate($number);

        $this->createGame($result);

        return $result;
    }

    private function createGame(array $result): void
    {
        $game = new Game();
        $game->user_id = Auth::id();
        $game->result = $result['result'];
        $game->number = $result['number'];
        $game->sum = $result['sum'];
        $game->save();
    }
}
