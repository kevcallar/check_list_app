<div class="modal fade" id="ModalCreate" tabindex="-1" role="dialog" aria-labelledby="ModalCreateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalCreateLabel">Add Item</h5>

            </div>
            <form method="POST" action="{{ route('items.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="itemName">Nombre:</label>
                        <input type="text" class="form-control" id="itemName" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="itemDescription">Descripción:</label>
                        <input type="text" class="form-control" id="itemDescription" name="descripcion">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Añadir</button>
                </div>
            </form>
        </div>
    </div>
</div>

