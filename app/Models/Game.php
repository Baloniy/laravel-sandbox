<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';

    public const RESULT_WIN = 'Win';
    public const RESULT_LOSE = 'Lose';

    protected $fillable = ['user_id', 'result', 'number', 'sum'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
