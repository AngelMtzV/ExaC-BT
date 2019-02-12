

<div class="modal fade" action="rouete => registra" id="ModalVer-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Nombre del usuario: {{ $user->name }}</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                 
               <!--Form para agregar-->
               <form action="">
                   <div class="modal-body">
                     <p>Edad:</p>
                     <h4 class="text-muted">{{ $user->edad }}</h4>
                     <p>Domicilio:</p>
                     <h4 class="text-muted">{{ $user->domicilio }}</h4>
                     <p>Correo electrónico:</p>
                     <h4 class="text-muted">{{ $user->email }}</h4>
                     <p>Contraseña:</p>
                     <h4 class="text-muted">{{ $user->password }}</h4>
                     <p>Tipo de usuario:</p>
                     <h4 class="text-muted">{{ $user->id_tipoUsuario }}</h4>
                     <hr>
                   </div>
            </form>
            </div>
        </div>
    </div>
</div>