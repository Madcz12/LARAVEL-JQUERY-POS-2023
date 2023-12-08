<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use Illuminate\Support\Facades\DB;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* return $request; */
        if ($request) {
            $query = trim($request->get('texto'));
            $categorias = DB::table('categorias')->where('categoria', 'LIKE', '%' . $query . '%')
                ->where('status', '=', '1')
                ->orderBy('id_categoria', 'desc')
                ->paginate(7);
            return view('almacen.categoria.index', ['categoria' => $categorias, "texto" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('almacen.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Categoria;
        $cat->categoria = $request->get('categoria');
        $cat->descripcion = $request->get('descripcion');
        $cat->status = '1';
        $cat->save();
        return Redirect::to('almacen/categoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('almacen.categoria.show', ["categoria" => Categoria::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("almacen.categoria.edit", ["categoria" => Categoria::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaFormRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->categoria = $request->get('categoria');
        $categoria->descripcion = $request->get('descripcion');
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->status = '0';
        $categoria->update();
        return Redirect::to('almacen/categoria');
    }
}
