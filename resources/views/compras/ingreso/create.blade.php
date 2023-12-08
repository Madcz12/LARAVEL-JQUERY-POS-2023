@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css">
    <link rel="stylesheet" href="public/dist/css/bootstrap-select.min.css">
    <h1>INGRESO DE PROVEEDORES</h1>
@stop

@section('content')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Nuevo Ingreso</h3>
            </div>
            <form action="{{ route('ingreso.store') }}" method="POST" class="form">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="proveedor">Proveedor</label>
                                <select name="proveedor_id" class="form-control" id="proveedor_id">
                                    @foreach ($clientes as $cli)
                                        <option value="{{ $cli->id_cliente }}">{{ $cli->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="tipo_documento">Tipo Documento</label>
                                <select name="tipo_documento" class="form-control" id="tipo_documento">
                                    <option value="rfc">RFC</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="num_documento">Num Documento</label>
                                <input type="text" class="form-control" name="num_documento" id="num_documento"
                                    placeholder="Ingresa el Num de Documento">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="proveedor">Productos</label>
                                <select name="pidarticulo" class="form-control selectpicker" id="pidarticulo"
                                    data-live-search="True">
                                    @foreach ($productos as $producto)
                                        <option value="{{ $producto->id_producto }}">{{ $producto->articulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" class="form-control" name="cantidad" id="pcantidad"
                                    placeholder="Cantidad">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="precio_compra">P. Compra</label>
                                <input type="number" class="form-control" name="precio_compra" step="0.01"
                                    min="0" id="pprecio_compra" placeholder="P. Compra">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="precio_venta">P. Venta</label>
                                <input type="number" class="form-control" name="precio_venta" step="0.01" min="0"
                                    id="pprecio_venta" placeholder="P. Venta">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="accion">Accion</label>
                                <button type="button" id="btn_add"
                                    class="btn btn-outline-success btn-sm">Agregar</button>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0" id="detalles">
                                        <thead style="background-color: #A9D0F5">
                                            <tr>
                                                <th>Opciones</th>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>P. Compra</th>
                                                <th>P. Venta</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <th>Total</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>
                                                <h4 id="total">$ 0.00</h4>
                                            </th>
                                        </tfoot>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                            <button type="reset" class="btn btn-danger me-1 mb-1">Cancelar</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{--     <script>
        console.log("hola");
        alert("hola");
    </script> --}}
    <script>
        $(document).ready(function() {
            $("#btn_add").click(function() {
                agregar();
            });
        });

        var cont = 0; // contador para los arreglos
        total = 0;
        subtotal = [];

        $("#guardar").hide();
        $("#pidarticulo").change(mostrarValores);

        function mostrarValores() {
            datosArticulo = document.getElementById('pidarticulo').value.split('_');
            $("#pcantidad").val(datosArticulo[1]);
            $("#unidad").html(datosArticulo[2]);
        }


        function agregar() {
            datosArticulo = document.getElementById('pidarticulo').value.split('_');
            idarticulo = datosArticulo[0];
            articulo = $("#pidarticulo option:selected").text();
            cantidad = $("#pcantidad").val();
            precio_compra = $("#pprecio_compra").val();
            precio_venta = $("#pprecio_venta").val();

            if (idarticulo != "" && cantidad != "" && cantidad > 0 && precio_compra != "" && precio_venta != "") {
                subtotal[cont] = (cantidad * precio_compra);
                total = total + subtotal[cont];

                var fila = '<tr class="selected" id="fila' + cont +
                    '"><td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont +
                    ');">X</button></td><td><input type="hidden" name="idarticulo[]" value"' + idarticulo + '">' +
                    idarticulo +
                    '</td><td><input type="number" name="cantidad[]" value="' + cantidad +
                    '"></td><td><input type="number" name="precio_compra[]" value="' + precio_compra +
                    '"></td><td><input type="number" name="precio_venta[]" value="' + precio_venta + '"></td><td>' +
                    subtotal[
                        cont] + '</td></tr>';
                cont++
                limpiar();
                $("#total").html("$ " + total);
                evaluar();
                $("#detalles").append(fila);
            } else {
                alert("Error al Ingresar el Detalle del Ingreso, Revise los Datos del Articulo");
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            $("#total").html("$: " + total);
            $("#fila" + index).remove();
            evaluar();
        }

        function limpiar() {
            $('#pcantidad').val();
            $('#pprecio_compra').val();
            $('#pprecio_venta').val();
        }

        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }
    </script>
@stop
