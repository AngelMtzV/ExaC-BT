@extends('layouts.app')

@section('content')

    <div class="container">
    	<div class="d-flex bd-light">
    	  <div class="p-2 flex-fill bd-highlight"><h2 class="text-muted">Listado de examenes</h2></i></a></div>
		  <div class="p-2 flex-fill bd-highlight"><a class="btn btn-info" href="{{ Route('examens.create') }}">Agregar examen <i class="fas fa-plus-circle"></i></a></div>
		</div>
		@if(Session::has('message'))
			<div class="alert alert-info">
				{{ Session::get('message') }}
			</div>
		@endif
	  <table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nombre</th>
		      <th scope="col"># Preguntas</th>
		      <th scope="col">Fecha de inicio</th>
		      <th scope="col">Tiempo</th>
		      <th scope="col">Acciones</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@forelse($examenes as $examen)
		    <tr>
		      <th scope="row">{{ $examen->id }}</th>
		      <td>{{ $examen->nombre }}</td>
		      <td>{{ $examen->no_preguntas }}</td>
		      <td>{{ $examen->fecha_inicio }}</td>
		      <td>{{ $examen->tiempo }} horas</td>
		      <td>
		      	<div class="row">
			      	<a data-target="#ModalVer-{{$examen->id}}" data-toggle="modal"><button class="btn btn-info"><i class="fas fa-eye"></i></button></a>
			      	<a class="btn btn-warning btnEditExa" href="{{ Route('examens.edit', $examen->id) }}"><i class="fas fa-edit"></i></a>
			      	<form action="{{ Route('examens.destroy', $examen->id) }}" method="POST">
			      		{{ csrf_field() }}
	            		@method('DELETE')
			      		<button class="btn btn-danger" type="submit" onclick="return confirm('¿Quiere borrar el examen?')">
			      			<i class="fas fa-trash-alt"></i>
			      		</button>
			      	</form>
		      	</div>
		      </td><!--<a class="btn btn-danger" href="{{ Route('examens.edit', $examen->id) }}">☠</a>-->
		    </tr>
		    @include('administrador.show')
		    @empty
		    <h2>Aún no hat ningún registro</h2>
		    @endforelse
		    <tr>
		  </tbody>
		</table>
		<div class="d-flex justify-content-center">
			{{ $examenes->links() }}
		</div>
	</div>

@endsection