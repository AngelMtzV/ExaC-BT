@extends('layouts.app')

@section('content')

  <!--{{ Auth::user()->name }}-->
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

  
<div class="col-xs-12" style="width: 90%; padding-left: 10%;">
  <div class="jumbotron">
    <h1 class="display-4">Examen de {{ $examen->nombre }}!</h1>
    <p class="lead">Plazo para el examen: {{ $examen->fecha_inicio }}.</p>
    <p class="lead">Este es el examen para el curso de nivel de {{ $examen->nombre }}. Al final del examen, ¡recibirás tu puntuación inmediatamente!</p>
    <hr class="my-4">
    <p class="lead">Tendrás {{ $examen->tiempo }} horas para contestar {{ $examen->no_preguntas }} preguntas.</p>
    <div class="btn-group float-right">
      <input class="btn btn-primary" id="comenzar" type="button" value="Comenzar  con el examen >>" onclick="confirmacion()">
    </div>
  </div>    
</div>
<input type="text" id="idExa" value="{{ $examen->id}}" hidden>


@endsection
