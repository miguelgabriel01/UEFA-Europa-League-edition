@extends('layouts.app')
@section('content')

<div class="d-flex align-items-center justify-content-center " style="height:50px; margin:10px;">

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Ações disponiveis
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{ route ('players.index')}}">Listar seus jogadores</a>
    <a class="dropdown-item" href="{{ route ('players.create')}}">Cadastar novo jogador</a>
  </div>
</div>
</div>

                @if ($errors->any())
                   <div class="alert alert-danger">
                          <strong>Ops!</strong>existem problemas com os dados recebidos <br><br>
                     <ul>
                        @foreach($errors->all() as $error)
                        <li>
                 {{$error}}
                        </li>
                        @endforeach
                   </ul>
                 </div>
               @endif



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-light bg-dark">{{ __('Edite os dados sobre seu jogador') }}</div>

                <div class="card-body">
                <form action="{{ route('players.update' , $player->id) }}" method="POST">                    
                    @csrf 
                    @method( 'PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$player->name}}"  rautofocus maxlength="100">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nationality" class="col-md-4 col-form-label text-md-right">{{ __('nacionalidade') }}</label>
                            <div class="col-md-6">
                                <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{$player->nationality}}" >
                                @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Idade') }}</label>
                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age"  value="{{$player->age}}">
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Posição') }}</label>
                        <div class="col-md-6">
                        <select id="inputState" class="form-control">
                            <!-- <option selected>Posição</option>!-->
                                <option value="{{$player->position}}">{{$player->position}}</option>
                                <option value="Goleiro">Goleiro</option>
                                <option value="Lateral direito">Lateral direito</option>
                                <option value="Lateral esquerdo">Lateral esquerdo</option>
                                <option value="Zagueiro">Zagueiro</option>
                                <option value="Volante">Volante</option>
                                <option value="Meio campo">Meio campo</option>
                                <option value="Atacante">Atacante</option>

                            </select>
                        </div>
                        </div>

                        <div class="form-group row">
                            <label for="nationality" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>
                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value=''  maxlength="510" >{{$player->description}}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Editar jogador') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection