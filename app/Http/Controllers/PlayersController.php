<?php

namespace App\Http\Controllers;

use App\Models\Players;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//classe de autenticação
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
               //Fazemos a validação dos campos de titulo e corpo da postagem
     $validatedData = $request ->validate([
        'name' => ['required','max:100'],//obrigatorio,valor unico e tem que possuir no maximo, 255 caracteres
        'email' => [ 'email:rfc,dns','required','unique:players'],//o email deve ser unico para cada jogador e é obrigatorio
        'number' => ['required','integer','unique:players','min:9'],//o numero vai ser unico, é obrigatorio, e deve conter entre 11 e 9 digitos
        'nationality' => ['required'],//obrigatorio
        'age' => ['required','integer'],
        'position' => ['required'],
        'description' => ['required'],
    ]);

        $player = new Players($validatedData);///criamos

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
                                         ->with('error', 'você não autorização para editar os dados deste jogador')
                                         ->withInput();
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Players  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Players $player)
    {
                       //Fazemos a validação dos campos de titulo e corpo da postagem
     $validatedData = $request ->validate([
        'name' => ['required','max:100'],//obrigatorio,valor unico e tem que possuir no maximo, 255 caracteres
        'email' => ['required',Rule::unique('players')->ignore($player)],//o email deve ser unico para cada jogador e é obrigatorio
        'number' => ['required',Rule::unique('players')->ignore($player),'max:11','min:9'],//o numero vai ser unico, é obrigatorio, e deve conter entre 11 e 9 digitos
        'nationality' => ['required'],//obrigatorio
        'age' => ['required'],
        'description' => ['required'],
    ]);

        if($player->user_id===Auth::id()){
            $player->update($request->all());
            return redirect()->route('players.index')->with('success', 'Atleta atualizado com sucesso');
        }
        else{
            return redirect()->route('players.index')
                                     ->with('error', 'você não autorização para editar as informações sobre este jogador')
                                     ->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Players  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Players $player)
    {
        if($player->user_id===Auth::id()){
            $player->delete();
            return redirect()->route('players.index')->with('success', 'Atleta deletado com sucesso');
        }
        else{
            return redirect()->route('players.index')
                                     ->with('error', 'você não tem autorização para deletar essa publicação')
                                     ->withInput();
        }


    }
}
