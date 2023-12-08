<div class="modal fade" id="modalEliminar{{ $prod->id_producto }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form action="{{ route('producto.destroy', $prod->id_producto) }}" method="POST">
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel"><span>Eliminar Producto</span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center">
                        <span>Seguro que quiere eliminar este producto? {{ $prod->nombre_prod }}</span>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span>No,
                            cancelar</span></button>
                    <button type="submit" class="btn btn-danger"><span>Si, eliminar</span></button>
                </div>
            </div>
        </form>
    </div>
</div>
