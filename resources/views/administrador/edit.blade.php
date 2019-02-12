
@extends('layouts.app')

@section('content')

    <div class="container col-md-6">
    	<h2 class="text-muted">Crear nuevo examen</h2>
    	<form action="{{ Route('examens.update',$examen->id) }}" method="POST">
    	  <div class="form-group">
    	    <label for="exampleInputNombre"></label>
    	    <input type="text" class="form-control" name="inpNombre" value="{{ $examen->nombre }}" aria-describedby="Nombre" placeholder="Nombre o tema del examen">
    	    <small id="Nombre" class="form-text text-muted">Debes introducir un nombre o tema para el examen.</small>
    	  </div>
    	  <div class="form-group">
    	    <label for="exampleInputNumeroPreguntas"></label>
    	    <input type="number" class="form-control" name="inpNumeroPreguntas" value="{{ $examen->no_preguntas }}" aria-describedby="NumeroPreguntas" placeholder="Numero de preguntas" max="100">
    	    <small id="NumeroPreguntas" class="form-text text-muted">Debes introducir un número de preguntas.</small>
    	  </div>
    	  <div class="form-group">
    	    <label for="exampleInputFecha"></label>
    	    <input type="date" class="form-control" name="inpFecha" value="{{ $examen->fecha_inicio }}" aria-describedby="Fecha" placeholder="Fecha de inicio">
    	    <small id="Fecha" class="form-text text-muted">Debes introducir una fecha de inicio para el examen.</small>
    	  </div>
    	  <div class="form-group">
    	    <label for="exampleInputTiempo"></label>
    	    <input type="number" class="form-control" name="inpTiempo" value="{{ $examen->tiempo }}" aria-describedby="Tiempo" max="10" placeholder="numero de horas">
    	    <small id="Tiempo" class="form-text text-muted">Debes introducir un numero de horas para el examen.</small>
    	  </div>
          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de usuario') }}</label>
              <div class="col-md-6">
                  <select class="form-control m-bot15" name="opcionTipoUsuario">
                    <option selected value="" disabled>Seleccione</option>
                    @forelse($usuarios as $valor)
                    @if($valor->id_tipoUsuario == 2)
                    <option value="{{ $valor->id }}" >{{ $valor->name }}</option> 
                    @endif
                    @empty
                    <option>No hay registros</option> 
                    @endforelse
                  </select><br>
              </div>
          </div><hr>
    	  <div class="float-right">
    	  	<button type="submit" class="btn btn-primary">Actualizar</button>
    	  </div>
          {{ csrf_field() }}
            @method('PUT')
    	</form>
	</div>
@endsection