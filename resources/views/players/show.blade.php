@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-center">

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



<main role="main">


<div class="album py-5 bg-light">
    <div class="container">
    
      <div class="row">

        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
          @isset($player->image)
          <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{ asset('storage/'.$player->image->path)}}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"></img>
          @endisset
           <div class="card-body">
        

           <p class="card-text">
                
              <b>Jogador: </b>{{$player->name}}<br>
              <b>Posição em campo:</b> {{$player->position}}<br>
              <b>Nacionalidade:</b> {{$player->nationality}}<br>
              <b>Idade:</b> {{$player->age}}<br><b>E-mail: </b>{{$player->email}}<br><b>Numero: </b>{{$player->number}}</p>

              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">

                <form action="{{route('players.destroy',$player->id)}}" method="POST">
                  <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('players.edit',$player->id)}}">Editar</a>

                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-secondary">Apagar</button>
                  </form>

                </div>
                <small class="text-muted">{{$player->id}}</small>
              </div>
            </div>
          </div>
        </div>
        
        <div class="jumbotron jumbotron-fluid" style="width:700px;">
           <div class="container">
              <p class="lead">{{$player->description}}</p>
          </div>
       </div>
      </div>
    </div>
  </div>
</main>
        

@endsection

