<?php
namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Gamer;
use Illuminate\Support\Facades\Auth;
use Request;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $gameExists = false;
        /** @var Game $game */
        $game = Game::where('id', '=', $request->session()->get('game'))->first();
        if ($game !== null && $request->session()->has('game')) {
            $gameName = 'Игра есть и имя ее ' . $game->name;
            $gameExists = true;
        }

        $gamers = Gamer::where('game_id', $request->session()->get('game'))->get();

        return view('game.index', [
            'test' => $gameName ?? 'Игры нет',
            'gameExists' => $gameExists,
            'gamers' => $gamers,
        ]);
    }

    public function create(Request $request)
    {
        $name = $request->get('name');
        $game = Game::create([
            'name' => $name,
            'user_id' => Auth::user()->id,
        ]);
        session(['game' => $game->id]);
        return redirect('/');
    }

    public function destroy(Request $request)
    {
        $request->session()->forget('game');
        return redirect('/');
    }
}
