

<div class="modal fade" action="rouete => registra" id="ModalVer-{{$examen->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Examen de {{ $examen->nombre }}</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                 
               <!--Form para agregar-->
               <form action="">
                   <div class="modal-body">
                     <p>Numero de preguntas:</p>
                     <h4 class="text-muted">{{ $examen->no_preguntas }}</h4>
                     <hr>
                     <p>Fecha de inicio:</p>
                     <h4 class="text-muted">{{ $examen->fecha_inicio }}</h4>
                     <hr>
                     <p>Limite de tiempo para realizarlo:</p>
                     <h4 class="text-muted">{{ $examen->tiempo }} horas</h4>
                     <hr>
                   </div>
                <div class="container">
                    <a class="btn btn-info" href="{{ Route('indexE',$examen->id) }}">Agregar preguntas</a>
                    <!--<button class="btn btn-info" type="submit">Agregar preguntas</button>-->
                </div>
            </form>
            </div>
        </div>
    </div>
</div>