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


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-light bg-dark">{{ __('Cadastre seu jogador') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('players.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nationality" class="col-md-4 col-form-label text-md-right">{{ __('Nacionalidade') }}</label>
                            <div class="col-md-6">
                                <input id="nationality" type="text" class="form-control @error('email') is-invalid @enderror" name="nationality" value='' required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Idade') }}</label>
                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age"  required autocomplete="age" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Posição') }}</label>
                        <div class="col-md-6">
                        <select id="inputState" class="form-control" name="position">
                            <!-- <option selected>Posição</option>!-->
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

                        <!--<div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('URL Foto*') }}</label>
                            <div class="col-md-6">
                                <input id="photo" type="text" class="form-control @error('name') is-invalid @enderror" name="photo"  required autocomplete="photo" autofocus>
                            </div>
                        </div>!-->

                        <div class="form-group row">
                            <label for="nationality" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>
                            <div class="col-md-6">
                                <textarea id="nationality" class="form-control @error('email') is-invalid @enderror" name="description" value='' required autocomplete="email"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Cadastrar jogador') }}
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