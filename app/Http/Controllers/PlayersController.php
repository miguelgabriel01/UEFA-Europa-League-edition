<?php

namespace App\Http\Controllers;

use App\Models\Players;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//classe de autenticação

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $player = Players::where('user_id',Auth::id())->orderBy('created_at','desc')->paginate(3);//asc para do mais velho ao mais novo

        return view('players.index',compact('player'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('players.create');//redireiona para a view de cadastro de jogadr
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //Post::create($request->all());
                $player = new Players($request->all());///criamos

                $player->user_id = Auth::id();//identificamos o autor
                $player->save();//salvamos
                return redirect('players')->with('success', 'Jogador cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Players  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Players $player)
    {
        return view('players.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Players  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Players $player)
    {
        if($player->user_id===Auth::id()){

            return view('players.edith', compact('player'));
            }
            else{
                return redirect()->route('players.index')
                                         ->with('error', 'você não autorização para editar esta publicação. por favor, vá dormi')
                                         ->withInput();
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }
}
