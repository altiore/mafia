<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * App\Game
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property integer $user_id
 * @method static \Illuminate\Database\Query\Builder|\App\Game whereUserId($value)
 */
class Game extends Model
{
    protected $fillable = [
        'name',
        'user_id',
    ];

    public static function boot()
    {
        parent::boot();
    }

}
