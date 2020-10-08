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


@if(session('success'))
<div class="alert alert-success">
  {{session('success')}}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
  {{session('error')}}
</div>
@endif

<main role="main">


  <div class="album py-5 bg-light">
    <div class="container">
    
      <div class="row">
      @foreach($player as $players)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
          @isset($players->image)
          <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{ asset('storage/'.$players->image->path)}}" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"></img>
          @endisset
           <div class="card-body">

           <p class="card-text">
                
              <b>Jogador: </b>{{$players->name}}<br>
              <b>Posição em campo:</b> {{$players->position}}<br>
              <b>Nacionalidade:</b> {{$players->nationality}}<br>
              <b>Idade:</b> {{$players->age}}</p>

              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">

                  <form action="{{route('players.destroy',$players->id)}}" method="POST">
                  <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('players.show',$players->id)}}">Mais</a>
                  <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('players.edit',$players->id)}}">Editar</a>

                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-secondary">Apagar</button>
                  </form>

                </div>
                <small class="text-muted">{{$players->id}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>


    </div>
  </div>

</main>
<div class="d-flex align-items-center justify-content-center">
{{ $player->links()}}
</div>
@endsection
