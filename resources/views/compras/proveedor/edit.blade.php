@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Editar Proveedor</h3>
            </div>
            <form action="{{ route('proveedor.update', $proveedor->id_cliente) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="categoria">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                    value="{{ $proveedor->nombre }}" placeholder="Ingresa el nombre del proveedor">
                            </div>
                            <div class="col-md-10 col-12">
                                <label for="categoria">Tipo Documento</label>
                                <select name="tipo_documento" class="form-control" id="tipo_documento">
                                    <option value="rfc">RFC</option>
                                </select>
                            </div>
                            <div class="col-md-10 col-12">
                                <label for="categoria">Num Documento</label>
                                <input type="text" class="form-control" name="num_documento" id="num_documento"
                                    value="{{ $proveedor->num_documento }}" placeholder="Ingresa el Num de Documento">
                            </div>
                            <div class="col-md-10 col-12">
                                <label for="categoria">Direccion</label>
                                <input type="text" class="form-control" name="direccion" id="direccion"
                                    value="{{ $proveedor->direccion }}" placeholder="Ingresa una Direccion">
                            </div>
                            <div class="col-md-10 col-12">
                                <label for="categoria">Telefono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono"
                                    value="{{ $proveedor->telefono }}" placeholder="Ingresa el Telefono">
                            </div>
                            <div class="col-md-10 col-12">
                                <label for="categoria">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ $proveedor->email }}" placeholder="emaail">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                    <button type="reset" class="btn btn-danger me-1 mb-1">Cancelar</button>
                </div>
            </form>
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
