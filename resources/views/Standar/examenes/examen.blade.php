<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>C&BT</title>

    <!-- Scripts -->
    <script type="text/javascript">
      //setInterval
      var cronometro;
      function detenerse()
      {
        if (cronometro === 100) {
          clearInterval(cronometro);
          alert("Se agoto tu tiempo.")
          window.location = "/../../home";
        }
      }
      function carga()
      {
          contador_s =0;
          contador_m =0;
          s = document.getElementById("segundos");
          m = document.getElementById("minutos");   
          cronometro = setInterval(
              function(){
                  if(contador_s==60)
                  {
                      contador_s=0;
                      contador_m++;
                      m.innerHTML = contador_m;
                      if(contador_m==60)
                      {
                          contador_m=0;
                      }
                  }
                  s.innerHTML = contador_s;
                  contador_s++;
              }
              ,1000);
      }
      </script>

    <script>
      function move() {
        var elem = document.getElementById("myBar");   
        var width = 0;
        var id = setInterval(frame, 100);
        function frame() {
          if (width == 100) {
            clearInterval(id);
          } else {
            width++; 
            elem.style.width = width + '%'; 
          }
        }
      }
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Styles / Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
      #myProgress {
        width: 100%;
        height: 30px;
        position: relative;
        background-color: #ddd;
      }

      #myBar {
        background-color: #4CAF50;
        width: 10px;
        height: 30px;
        position: absolute;
      }
    </style>

</head>
<body onload="move()">
    <div id="app">
        <div class="pos-f-t">
          <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
              <h5 class="text-white h4">Consulting & Business Training</h5>
              <span class="text-muted">Menú</span>
              <!--<ul class="navbar-nav mr-auto">
                  <li class="nav-item active"><a class="nav-link btn btn-outline-info" href="{{ Route('users.index') }}">Usuarios <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active"><a class="nav-link btn btn-outline-info" href="{{ Route('examens.index') }}">Examenes <span class="sr-only">(current)</span></a>
                  </li>                    
              </ul>-->
              @if(auth()->user()->id_tipoUsuario == 1)
                @include('layouts.menuAdmi')
              @else
                @include('layouts.menuStandar')
              @endif
            </div>
          </div>
          <nav class="navbar navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>👨‍💻
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
          </nav>
        </div>
        <main class="py-4">
                <!--{{ Auth::user()->name }}-->
                @if (session('status'))
                    <div>
                        {{ session('status') }}
                    </div>
                @endif
            <div class="col-xs-12" style="width: 90%; padding-left: 10%;">
              <div class="jumbotron">
                <div class="row float-right">
                  <button class="btn btn-primary" type="button" disabled>
                    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                    <p class="lead">Tiempo: <span class="badge badge-light" id="minutos">0</span>:<span class="badge badge-light" id="segundos">0</span></p>
                  </button>
                </div>
                <div id="myProgress">
                  <div id="myBar"></div>
                </div>
                <h1 class="display-4">Examen de {{ $examen->nombre }}!</h1>
                <hr class="my-4">
                  @foreach($preguntas as $pre)
                    <p id="pregunta">
                      <input hidden type="text" id="idPregunta" name="idPregunta" value="{{ $pre->id }}">
                          {{ $pre->id }}.- {{ $pre->pregunta }}
                    </p>
                    <div id="opciones" class="contairner">
                      <select class="custom-select" multiple> 
                        <option class="list-group-item list-group-item-action" value="1">
                          1.- {{ $pre->opcion1 }}
                        </option>
                        <option class="list-group-item list-group-item-action" value="2">
                          2.- {{ $pre->opcion2 }}
                        </option>
                        <option class="list-group-item list-group-item-action" value="3">
                          3.- {{ $pre->opcion3 }}
                        </option>
                        <option class="list-group-item list-group-item-action" value="4">
                          4.- {{ $pre->opcion4 }}
                        </option>
                      </select>
                    </div>
                  @endforeach
                    <hr>
              </div>   
            </div>
        </main>
    </div>

    <!--Scropts-->
    <!-- jQuery 3 -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <!--Scripts de la applicación-->
</body>
</html>