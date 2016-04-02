<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * App\Gamer
 *
 * @property integer $id
 * @property integer $game_id
 * @property integer $user_id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Game $game
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Gamer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Gamer whereGameId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Gamer whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Gamer whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Gamer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Gamer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Gamer extends Model
{
    protected $fillable = [
        'name',
        'game_id',
    ];

    protected $hidden = [
        'user_id',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
