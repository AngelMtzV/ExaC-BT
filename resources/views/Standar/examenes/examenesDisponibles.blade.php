@extends('layouts.app')

@section('content')

  <!--{{ Auth::user()->name }}-->
    @if (session('status'))
        <div>
            {{ session('status') }}
        </div>
    @endif

<div class="container">
    <div class="col-xs-12" style="width: 80%; padding-left: 15%;">
      <div class="jumbotron">
        <h1 class="display-4">Bienvenido {{ Auth::user()->name }}!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
          <!-- Example single danger button -->
          <div class="btn-group float-right">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Examenes disponibles para mi</button>
            <div class="dropdown-menu">
              @if(isset($examenes))
              @foreach($examenes as $value)
              <a class="dropdown-item" href="/examen/{{$value->id}}">{{ $value->nombre }}</a>
              @endforeach
              @endif
            </div>
          </div>
      </div>    
    </div>
</div>
@endsection
