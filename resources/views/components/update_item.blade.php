@foreach ($listaItems as $item )
    <form method="POST" action="{{ route('items.update', $item->id) }}">
    @csrf
    @method('PUT')
    <div class="modal fade" id="ModalUpdate{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="updateItemModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateItemModalLabel{{ $item->id }}">Actualizar Ítem</h5>
                    
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">
                            Nombre
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre" type="text" placeholder="Nombre" name="nombre" value="{{ old('nombre', $item->nombre) }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="descripcion">
                            Descripción
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="descripcion" type="text" placeholder="Descripción" name="descripcion" value="{{ old('descripcion', $item->descripcion) }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach

