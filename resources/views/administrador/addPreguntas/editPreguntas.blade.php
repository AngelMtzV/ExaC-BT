
@extends('layouts.app')

@section('content')

    
    @if(Session::has('message')) 
        <div class="alert alert-info">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="container col-md-6">
    	<h2 class="text-muted">Agregar preguntas</h2>
    	<form action="{{ Route('preguntas.update', $pregunta->id) }}" method="POST">
			{{ csrf_field() }}
      @method('PUT')
    	  <div class="form-group">
    	    <label for="exampleInputPregunta"></label>
    	    <input type="text" class="form-control" value="{{ $pregunta->pregunta }}" name="inpPregunta" aria-describedby="Nombre" placeholder="¿Pregunta...?">
    	    <small id="Nombre" class="form-text text-muted">Debes introducir una pregunta para el examen.</small>
    	  </div>
    	  <div class="form-group">
    	    <label for="exampleInputOpcion1"></label>
    	    <input type="text" class="form-control" value="{{ $pregunta->opcion1 }}" name="inpOpcion1" aria-describedby="NumeroPreguntas" placeholder="Opcion 1" max="100">
    	    <small id="NumeroPreguntas" class="form-text text-muted">Debes introducir la primera opcion para la pregunta.</small>
    	  </div>
    	  <div class="form-group">
    	    <label for="exampleInputOpcion2"></label>
    	    <input type="text" class="form-control" value="{{ $pregunta->opcion2 }}" name="inpOpcion2" aria-describedby="Fecha" placeholder="Opcion 2">
    	    <small id="Fecha" class="form-text text-muted">Debes introducir la segunda opcion para la pregunta.</small>
    	  </div>
    	  <div class="form-group">
    	    <label for="exampleInputOpcion3"></label>
    	    <input type="text" class="form-control" value="{{ $pregunta->opcion3 }}" name="inpOpcion3" aria-describedby="Tiempo" max="10" placeholder="Opcion 3">
    	    <small id="Tiempo" class="form-text text-muted">Debes introducir la tercera opcion para la pregunta.</small>
    	  </div>
          <div class="form-group">
            <label for="exampleInputOpcion4"></label>
            <input type="text" class="form-control" value="{{ $pregunta->opcion4 }}" name="inpOpcion4" aria-describedby="Tiempo" max="10" placeholder="Opcion 4">
            <small id="Tiempo" class="form-text text-muted">Debes introducir la cuarta opcion para la pregunta.</small>
          </div>
          <input type="text" name="inpIdExamen" value="{{ $pregunta->id_examen }}" hidden>
          <select class="form-control m-bot15" name="opcionid">
            <option selected value="" disabled>Seleccione la opción correcta</option>
           <option value="1" >Opcion 1</option> 
           <option value="2" >Opcion 2</option> 
           <option value="3" >Opcion 3</option> 
           <option value="4" >Opcion 4</option> 
          </select><br>
    	  <div class="float-right">
    	  	<button type="submit" class="btn btn-primary">Enviar ➤</button>
    	  </div>
    	</form>
	</div>
    
    <br><br><hr>
@endsection