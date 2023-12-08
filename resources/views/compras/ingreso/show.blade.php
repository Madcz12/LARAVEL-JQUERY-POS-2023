@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>INGRESO DE PROVEEDORES</h1>
@stop

@section('content')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Detalle Ingreso</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="proveedor">Proveedor</label>
                            <p>{{ $ingresos->nombre }}</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="categoria">Tipo Documento</label>
                            <p>{{ $ingresos->tipo_comprobante }}</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="categoria">Num Documento</label>
                            <p>{{ $ingresos->num_comprobante }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-body">

                        </div>
                        <div class="table-responsive">
                            <table id="detalles" class="table table-hover mb-0">
                                <thead style="background-color: #A9D0F5">
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>P Compra</th>
                                        <th>P Venta</th>
                                        <th>SubTotal</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Total:</th>
                                    <th>
                                        <h4 id="total">$ {{ number_format($ingresos->total, 2) }}</h4>
                                    </th>
                                </tfoot>
                                <tbody>
                                    @foreach ($detalles as $det)
                                        <tr>
                                            <td>{{ $det->productos }}</td>
                                            <td>{{ $det->cantidad }}</td>
                                            <td>{{ $det->precio_compra }}</td>
                                            <td>{{ $det->precio_venta }}</td>
                                            <td>{{ number_format($det->cantidad * $det->precio_compra, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            </div>
        </div>
    </div>
    </div>
    </div>

    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
