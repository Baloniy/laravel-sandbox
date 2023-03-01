<?php

declare(strict_types=1);

namespace App\Services;

class GameCalculator
{
    public function calculate(int $number): float
    {
        if ($number > 900) {
            $sum = $number * 0.7;
        } elseif ($number > 600) {
            $sum = $number * 0.5;
        } elseif ($number > 300) {
            $sum = $number * 0.3;
        } else {
            $sum = $number * 0.1;
        }

        return $sum;
    }
}
