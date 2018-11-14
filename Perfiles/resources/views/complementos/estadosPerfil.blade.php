<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
    <div class="modal-dialog modal-sm-12" role="document">


        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cambiar el Estado Del Perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <select name="" id="nuevoEstado" class="form-control">
                    <option >Defendido</option>
                    <option >Tribunal</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a data-ruta="{{ route('cambiarEstadoPerfil',$perfil)}}" data-celda ="" data-dismiss="modal"
                type="button" class="btn btn-primary cambiarEstado" style="color: white">Cambiar Estado</a>
            </div>
        </div>
    </div>
</div>