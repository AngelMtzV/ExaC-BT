@extends('layouts.app')

@section('content')

    <div class="container">
    	<div class="d-flex bd-light">
    	  <div class="p-2 flex-fill bd-highlight"><h2 class="text-muted">Listado de Usuarios</h2></div>
		  <div class="p-2 flex-fill bd-highlight"><a class="btn btn-info" href="{{ Route('users.create') }}">Agregar usuarios <i class="fas fa-plus-circle"></i></a></div>
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
		      <th scope="col">E-mail</th>
		      <th scope="col">Tipo de usuario</th>
		      <th scope="col">Acciones</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@forelse($users as $user)
		  	@if($user->id_tipoUsuario != 1)
		    <tr>
		      <th scope="row">{{ $user->id }}</th>
		      <td>{{ $user->name }}</td>
		      <td>{{ $user->email }}</td>
		      <td>{{ $user->id_tipoUsuario }}</td>
		      <td>
		      	 <div class="row">
			      	<a data-target="#ModalVer-{{$user->id}}" data-toggle="modal"><button class="btn btn-info"><i class="fas fa-eye"></i></button></a>
			     </div>
			     <div class="row">
			      	<a class="btn btn-warning btnEdit" href="{{ Route('users.edit', $user->id) }}"><i class="fas fa-edit"></i></a>
			     </div>
			      <div class="row">
			      	<form action="{{ Route('users.destroy', $user->id) }}" method="POST">
			      		{{ csrf_field() }}
	            		@method('DELETE')
			      		<button class="btn btn-danger" type="submit" onclick="return confirm('¿Quiere eliminar a el usuario?')">
			      			<i class="fas fa-trash-alt"></i>
			      		</button>
			      	</form>
		      	</div>
		      </td>
		    </tr>
		    @include('administrador.usuarios.showUser')
		    @endif
		    @empty
		    <h2>Aún no hat ningún registro</h2>
		    @endforelse
		    <tr>
		  </tbody>
		</table>
		<div class="d-flex justify-content-center">
			{{ $users->links() }}
		</div>
	</div>

@endsection