

    <div class="modal fade" action="rouete => registra" id="ModalVer-{{$pregunta->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Pregunta: {{ $pregunta->pregunta }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                 
                   <div class="modal-body">
                     <p>Opcion 1:</p>
                     <h6 class="text-muted">{{ $pregunta->opcion1 }}</h6>
                     <hr>
                     <p>Opcion 2:</p>
                     <h6 class="text-muted">{{ $pregunta->opcion2 }}</h6>
                     <hr>
                     <p>Opcion 3:</p>
                     <h6 class="text-muted">{{ $pregunta->opcion3 }}</h6>
                     <hr>
                     <p>Opcion 4:</p>
                     <h6 class="text-muted">{{ $pregunta->opcion4 }}</h6>
                     <hr>
                     <p>Respuesta correcta:</p>
                     <h6 class="text-muted">Opcion {{ $pregunta->respuesta }}</h6>
                     <hr>
                   </div>
                </div>
            </div>
        </div>
    </div>