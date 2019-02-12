@extends('login')

@section('content')
    <form>
	  <div class="form-row align-items-center float-right">
	    <div class="col-sm-6 my-1">
	      <label class="sr-only" for="inlineFormInputGroupUsername">Email</label>
	      <div class="input-group">
	        <div class="input-group-prepend">
	          <div class="input-group-text">@</div>
	        </div>
	        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Email">
	      </div>
	    </div>
	    <div class="col-sm-4 my-1">
	      <label class="sr-only" for="inlineFormInputName">Contraseña</label>
	      <input type="password" class="form-control" id="inlineFormInputName" placeholder="Contraseña">
	    </div>
	    <div class="col-auto my-1">
	    	<!--<button class="btn btn-primary" id="entrar" type="submit">Ingresar</button>-->
	    	<input class="btn btn-primary" id="entrar" type="button" value="Entrar➥" onclick="iniciar()">
	    </div>
	  </div>
	</form>
@endsection