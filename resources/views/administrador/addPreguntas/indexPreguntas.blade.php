
@extends('layouts.app')

@section('content')

    <div class="container">
      @if(Session::has('message'))
          <div class="alert alert-info">
              {{ Session::get('message') }}
          </div>
      @endif
    </div>
    <div class="container col-md-6">
      <div class="card">
        <div class="card card-header">
          <h2 class="text-muted">Agregar preguntas al examen de <span>{{ $examen->nombre }}</span></h2>
        </div>
          <div class="container">
            <form action="{{ Route('preguntas.store') }}" method="POST">
              {{ csrf_field() }}
                <div class="form-group">
                  <label for="exampleInputPregunta">Pregunta:</label>
                  <!--<input type="text" class="form-control" name="inpPregunta" aria-describedby="Nombre" placeholder="¿Pregunta...?">-->
                  <textarea class="form-control" name="inpPregunta" id="exampleFormControlTextarea1" rows="3"></textarea>
                  <small id="Nombre" class="form-text text-muted">Debes introducir una pregunta para el examen.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputOpcion1">Opción 1:</label>
                  <input type="text" class="form-control" name="inpOpcion1" aria-describedby="NumeroPreguntas" placeholder="Opcion 1" max="100">
                  <small id="NumeroPreguntas" class="form-text text-muted">Debes introducir la primera opcion para la pregunta.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputOpcion2">Opción 2:</label>
                  <input type="text" class="form-control" name="inpOpcion2" aria-describedby="Fecha" placeholder="Opcion 2">
                  <small id="Fecha" class="form-text text-muted">Debes introducir la segunda opcion para la pregunta.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputOpcion3">Opción 3:</label>
                  <input type="text" class="form-control" name="inpOpcion3" aria-describedby="Tiempo" max="10" placeholder="Opcion 3">
                  <small id="Tiempo" class="form-text text-muted">Debes introducir la tercera opcion para la pregunta.</small>
                </div>
                  <div class="form-group">
                    <label for="exampleInputOpcion4">Opción 4:</label>
                    <input type="text" class="form-control" name="inpOpcion4" aria-describedby="Tiempo" max="10" placeholder="Opcion 4">
                    <small id="Tiempo" class="form-text text-muted">Debes introducir la cuarta opcion para la pregunta.</small>
                  </div>
                  <input type="text" class="form-control" name="inpIdExamen" value="{{ $idExamen }}" hidden>
                  <select class="form-control m-bot15" name="opcionid">
                    <option selected value="" disabled>Seleccione la opción correcta</option>
                   <option value="1" >Opcion 1</option> 
                   <option value="2" >Opcion 2</option> 
                   <option value="3" >Opcion 3</option> 
                   <option value="4" >Opcion 4</option> 
                  </select><br>

                <div class="float-right">
                  <button type="submit" class="btn btn-primary">Enviar ➤</button><hr>
                </div>
              </form>
          </div>
              
      </div>
	</div>
    
    <br><br><hr>
     <div class="container">
      <table class="table table-responsive">
          <thead class="thead-dark">
            <tr>
              <th scope="col"># de pregunta</th>
              <th scope="col">Pregunta</th>
              <th scope="col">Opcion 1</th>
              <th scope="col">Opcion 2</th>
              <th scope="col">Opcion 3</th>
              <th scope="col">Opcion 4</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @forelse($preguntas as $pregunta)
            <tr>
              <td>{{ $pregunta->id }}</td>
              <td>{{ $pregunta->pregunta }}</td>
              <td>{{ $pregunta->opcion1 }}</td>
              <td>{{ $pregunta->opcion2 }}</td>
              <td>{{ $pregunta->opcion3 }}</td>
              <td>{{ $pregunta->opcion4 }}</td> 
              <td>
                <div class="row">
                  <a data-target="#ModalVer-{{$pregunta->id}}" data-toggle="modal"><button class="btn btn-info"><i class="fas fa-eye"></i></button></a>
                </div>
                <div class="row">
                  <a class="btn btn-warning btnEdit" href="{{ Route('preguntas.edit', $pregunta->id) }}"><i class="fas fa-edit"></i></a>
                </div>
                <div class="row">
                  <form action="{{ Route('preguntas.destroy', $pregunta->id) }}" method="POST">
                      {{ csrf_field() }}
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit" onclick="return confirm('¿Quiere eliminar la pregunta?')">
                          <i class="fas fa-trash-alt"></i>
                      </button>
                  </form>
                </div>
              </td>
            </tr>
            @include('administrador.addPreguntas.showPregunta')
            @empty
            <h2>Aún no hay ningún registro</h2>
            @endforelse
            <tr>
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $preguntas->links() }}
        </div>
    </div>
@endsection