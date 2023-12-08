@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Producto</h1>
@stop

@section('content')
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Editar Producto</h3>
            </div>
            <form action="{{ route('producto.update', $producto->id_producto) }}" method="POST" enctype="multipart/form-data"
                class="form">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="categoria">Nombre</label>
                                <input type="text" class="form-control" name="nombre_prod" id="nombre_prod"
                                    value="{{ $producto->nombre_prod }}" placeholder="Ingresa un nombre">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="descripcion">Categoria</label>
                                <select name="id_categoria" class="form-control" id="id_categoria">
                                    @foreach ($categorias as $cat)
                                        @if ($cat->id_categoria == $producto->id_categoria)
                                            <option value="{{ $cat->id_categoria }}">{{ $cat->id_categoria }}</option>
                                        @else
                                            <option value="{{ $cat->id_categoria }}">{{ $cat->id_categoria }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="categoria">Codigo</label>
                                <input type="text" class="form-control" name="codigo_prod" id="codigo_prod"
                                    value="{{ $producto->codigo_prod }}" placeholder="Ingresa un codigo">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="categoria">Stock</label>
                                <input type="text" class="form-control" name="stock" id="stock"
                                    value="{{ $producto->stock }}" placeholder="Ingresa un stock">
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
                                    value="{{ $producto->descripcion }}" placeholder="Ingresa una descripcion">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="categoria">Imagen</label>
                                <input type="file" class="form-control" name="imagen" id="imagen">
                                @if ($producto->imagen_prod = !'')
                                    <img src="{{ asset('imagenes/productos/' . $producto->imagen_prod) }}" alt=""
                                        height="100px" width="100px">
                                @endif
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
