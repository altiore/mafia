<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Http\Requests;
use Validator;

class GameController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $gameExists = false;
        if ($request->session()->has('game')) {
            $test = 'Игра есть и имя ее ' . $request->session()->get('game');
            $gameExists = true;
        }

        return view('game.index', [
            'test' => $test ?? 'Игры нет',
            'gameExists' => $gameExists,
        ]);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $name = $request->get('name');
        Game::create([
            'name' => $name,
        ]);
        session(['game' => $name]);
        return redirect('/');
    }
    public function destroy(Request $request)
    {
        $request->session()->forget('game');
        return redirect('/');
    }
}
