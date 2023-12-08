@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Producto</h1>
@stop

@section('content')
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Nuevo Producto</h3>
            </div>
            <form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data" class="form">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="categoria">Nombre</label>
                                <input type="text" class="form-control" name="nombre_prod" id="nombre_prod"
                                    placeholder="Ingresa un nombre">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="descripcion">Categoria</label>
                                <select name="id_categoria" class="form-control" id="id_categoria">
                                    @foreach ($categorias as $cat)
                                        <option value="{{ $cat->id_categoria }}">{{ $cat->categoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="categoria">Codigo</label>
                                <input type="text" class="form-control" name="codigo_prod" id="codigo_prod"
                                    placeholder="Ingresa un codigo">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="categoria">Stock</label>
                                <input type="text" class="form-control" name="stock" id="stock"
                                    placeholder="Ingresa un stock">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="descripcion">Unidad</label>
                                <select name="unidad" class="form-control" id="unidad">
                                    <option value="">Piezas</option>
                                    <option value="">Kilos</option>
                                    <option value="">Cajas</option>
                                    <option value="">Paquetes</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion"
                                    placeholder="Ingresa una descripcion">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="categoria">Imagen</label>
                                <input type="file" class="form-control" name="imagen" id="imagen">
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
