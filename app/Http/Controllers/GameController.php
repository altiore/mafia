<?php
namespace App\Http\Controllers;

use App\Gamer;
use Illuminate\Http\Request;
use App\Game;
use App\Http\Requests;
use Validator;

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
        if ($request->session()->has('game')) {
            $test = 'Игра есть и имя ее ' . $game->name;
            $gameExists = true;
        }

        return view('game.index', [
            'test' => $test ?? 'Игры нет',
            'gameExists' => $gameExists,
            //'gamers' => Gamer::where('game_id', $request->get('id')),
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $name = $request->get('name');
        $game = Game::create([
            'name' => $name,
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
