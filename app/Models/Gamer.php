<?php

namespace App\Models;

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
 * @property-read \App\Models\Game $game
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Gamer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Gamer whereGameId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Gamer whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Gamer whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Gamer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Gamer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Gamer extends Model
{
    protected $fillable = [
        'name',
        'game_id',
        'creator_id',
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
