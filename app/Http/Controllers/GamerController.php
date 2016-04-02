<?php

namespace App\Http\Controllers;

use App\Gamer;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class GamerController
 *
 * @package App\Http\Controllers
 * @property Request $request
 */
class GamerController extends Controller
{
    protected $redirect = 'game.index';

    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:32',
        ]);

        Gamer::create([
            'name'    => $request->get('name'),
            'game_id' => $request->session()->get('game'),
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gamer::destroy($id);

        return redirect('/');
    }
}
