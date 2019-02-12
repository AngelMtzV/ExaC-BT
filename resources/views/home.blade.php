@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido {{ auth()->user()->id_tipoUsuario == 1 ? 'Administrador' : 'Standard' }}
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
                @if(auth()->user()->id_tipoUsuario == 2)
                  @include('Standar.examenes.examenesDisponibles')
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
