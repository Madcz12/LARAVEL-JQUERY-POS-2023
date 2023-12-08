<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProveedorFormRequest;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('texto'));
            $proveedor = DB::table('clientes')->where('nombre', 'LIKE', '%' . $query . '%')
                ->where('tipo_persona', '=', 'PROVEEDOR')
                ->where('status', '=', '1')
                ->orderBy('id_cliente', 'desc')
                ->paginate(7);
            return view('compras.proveedor.index', ['proveedor' => $proveedor, "texto" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('compras.proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorFormRequest $request)
    {
        $proveedor = new Proveedores;
        $proveedor->tipo_persona = 'PROVEEDOR';
        $proveedor->nombre = $request->get('nombre');
        $proveedor->tipo_documento = $request->get('tipo_documento');
        $proveedor->num_documento = $request->get('num_documento');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->email = $request->get('email');
        $proveedor->status = '1';
        $proveedor->save();
        return redirect()->route('proveedor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('compras.proveedor.show', ["proveedor" => Proveedores::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('compras.proveedor.edit', ["proveedor" => Proveedores::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedorFormRequest $request, $id)
    {
        $proveedor = Proveedores::findOrFail($id);
        $proveedor->nombre = $request->get('nombre');
        $proveedor->tipo_documento = $request->get('tipo_documento');
        $proveedor->num_documento = $request->get('num_documento');
        $proveedor->direccion = $request->get('direccion');
        $proveedor->telefono = $request->get('telefono');
        $proveedor->email = $request->get('email');
        $proveedor->save();
        return redirect()->route('compras/proveedor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedores::findOrFail($id);
        $proveedor->estado = 'Inactivo';
        $proveedor->update();
        return redirect()->route('proveedor.index')->with('success', 'proveedor eliminado correctamente');
    }
}
