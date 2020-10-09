<?php

namespace App\Http\Controllers;

use App\Models\Players;
use App\Models\Image;
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
        'number' => ['required','unique:players','min:9'],//o numero vai ser unico, é obrigatorio, e deve conter entre 11 e 9 digitos
        'nationality' => ['required'],//obrigatorio
        'age' => ['required','integer'],
        'position' => ['required'],
        'description' => ['required'],
        //'image' => ['dimensions:min_width=200,min_height=200'],
    ]);

        $player = new Players($validatedData);///criamos

                $player->user_id = Auth::id();//identificamos o autor
                $player->save();//salvamos

                if($request->hasFile('image') and $request->file('image')->isValid()){
                    $extension = $request->image->extension();//deixo a estensão da img isolada
                   
                    //crio um nome para a img
                    $image_name = now()->toDateTimeString()."_".substr(base64_encode(sha1(mt_rand())),0,10);
        
                    $path = $request->image->storeAs('players',$image_name.".".$extension,'public');
        
                    $image = new Image();
                    $image->players_id = $player->id;
                    $image->path = $path;
                    $image->save(); 
                }

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
                       //Fazemos a validação dos campos de titulo e corpo da playeragem
     $validatedData = $request ->validate([
        'name' => ['required','max:100'],//obrigatorio,valor unico e tem que possuir no maximo, 255 caracteres
        'email' => ['required',Rule::unique('players')->ignore($player)],//o email deve ser unico para cada jogador e é obrigatorio
        'number' => ['required',Rule::unique('players')->ignore($player),'min:9'],//o numero vai ser unico, é obrigatorio, e deve conter entre 11 e 9 digitos
        'nationality' => ['required'],//obrigatorio
        'age' => ['required'],
        'description' => ['required'],
       // 'image' => ['mimes:jpeg,jpg,png','dimensions:min_width=200,min_height=200'],

    ]);

        if($player->user_id===Auth::id()){
            $player->update($request->all());

            if($request->hasFile('image') and $request->file('image')->isValid()){
                //$player->image->delete();

                $extension = $request->image->extension();//deixo a estensão da img isolada
           
                //crio um nome para a img
                $image_name = now()->toDateTimeString()."_".substr(base64_encode(sha1(mt_rand())),0,10);

                $path = $request->image->storeAs('players',$image_name.".".$extension,'public');
//                $path = $request->image->storeAs('public/posts',$image_name.".".$extension,'public');

                $image = new Image();
                $image->path = $path;
                $image->players_id = $player->id;
                $image->save(); 
    

            }

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
