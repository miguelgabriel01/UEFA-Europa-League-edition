@extends('layouts.app')

@section('content')

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
              <b>Time atual:</b> {{$players->user->name}}<br>
              <b>Idade:</b> {{$players->age}}</p>
              <br><br>

              <p class="text-secondary"><b>{{$players->description}}</b>
            </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="">
                  <small>{{$players->email}}</small></br>
                  <small>{{$players->number}}</small>
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
