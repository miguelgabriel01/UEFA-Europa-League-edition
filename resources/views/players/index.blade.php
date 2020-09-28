@extends('layouts.app')

@section('content')


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
          <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
           <div class="card-body">

           <p class="card-text">
                
              <b>Jogador: </b>{{$players->name}}<br>
              <b>Posição em campo:</b> {{$players->position}}<br>
              <b>Nacionalidade:</b> {{$players->nationality}}<br>
              <b>Idade:</b> {{$players->age}}</p>

              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">

                <button type="button" class="btn btn-sm btn-outline-secondary">Mais</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Apagar</button>

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
        

@endsection