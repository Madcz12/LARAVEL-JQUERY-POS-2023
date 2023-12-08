<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoFormRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $texto = trim($request->get('texto'));
            $producto = DB::table('productos as a')
                ->join('categorias as c', 'a.categoria_id', '=', 'c.id_categoria')
                ->select('a.id_producto', 'a.nombre_prod', 'a.codigo_prod', 'a.stock', 'c.categoria', 'a.descripcion', 'a.imagen_prod', 'a.estado')
                ->where('a.nombre_prod', 'LIKE', '%' . $texto . '%')
                ->orWhere('a.codigo_prod', 'LIKE', '%' . $texto . '%')
                ->orderBy('id_producto', 'desc')
                ->paginate(10);
            return view('almacen.producto.index', compact('producto', 'texto'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = DB::table('categorias')->where('status', '=', '1')->get();
        return view('almacen.producto.create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto;
        $producto->categoria_id = $request->get('id_categoria');
        $producto->codigo_prod = $request->get('codigo_prod');
        $producto->nombre_prod = $request->get('nombre_prod');
        $producto->stock = $request->get('stock');
        $producto->descripcion = $request->get('descripcion');
        $producto->estado = 'Activo';
        // script para subir la imagen
        if ($request->hasFile('imagen')) {
            $imagen_prod = $request->file('imagen');
            $nombreImagen = Str::slug($request->nombre_prod) . "." . $imagen_prod->guessExtension();
            $ruta = public_path("/imagenes/productos/");
            copy($imagen_prod->getRealPath(), $ruta . $nombreImagen);
            $producto->imagen_prod = $nombreImagen;
        }
        $producto->save();
        return Redirect::to('almacen/producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    /* public function show($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->estado = 'Activo';
        dd($producto);
        $producto->update();
        return redirect()->route('producto.index');
    } */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = DB::table('categorias')->where('status', '=', '1')->get();
        return view('almacen.producto.edit', ['producto' => $producto, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoFormRequest $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->categoria_id = $request->get('id_categoria');
        $producto->codigo_prod = $request->get('codigo');
        $producto->nombre_prod = $request->get('nombre');
        $producto->stock = $request->get('stock');
        $producto->descripcion = $request->get('descripcion');
        $producto->estado = 'Activo';
        // script para subir la imagen
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::slug($request->nombre) . "." . $imagen->guessExtension();
            $ruta = public_path("/images/productos/");
            copy($imagen->getRealPath(), $ruta . $nombreImagen);
            $producto->imagen = $nombreImagen;
        }
        $producto->update();
        return redirect()->route('producto.index');
    }

    public function aprobar($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->estado = 'Activo';
        $producto->save();
        return redirect()->route('producto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->estado = 'Inactivo';
        $producto->update();
        return redirect()->route('producto.index');
    }
}
