<!-- Modal -->
<form action=""  method="POST" id="nuevoTutor">
 {!! csrf_field() !!}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
    <div class="modal-dialog modal-sm-12" role="document">


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Tutor de Perfil de Grado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">´
           
                <select name="tutor_id" id="nuevosTutores" class="form-control">
                   
                </select>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button href="" data-ruta="" data-celda ="" data-dismiss="modal" id="cambiarTutor"
                    type="button" class="btn btn-primary " style="color: white">Cambiar Tutor</button> 
            </div>
        </div>
    </div>
</div>
</form>