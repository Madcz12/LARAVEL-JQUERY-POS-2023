<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('texto'));
            $clientes = DB::table('clientes')->where('nombre', 'LIKE', '%' . $query . '%')
                ->where('tipo_persona', '=', 'CLIENTE')
                /* ->where('status', '=', '1') */
                ->orderBy('id_cliente', 'desc')
                ->paginate(7);
            return view('ventas.clientes.index', ['clientes' => $clientes, "texto" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ventas.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteFormRequest $request)
    {
        $cliente = new Cliente;
        $cliente->tipo_persona = 'CLIENTE';
        $cliente->nombre = $request->get('nombre');
        $cliente->tipo_documento = $request->get('tipo_documento');
        $cliente->num_documento = $request->get('num_documento');
        $cliente->direccion = $request->get('direccion');
        $cliente->telefono = $request->get('telefono');
        $cliente->email = $request->get('email');
        $cliente->status = '1';
        $cliente->save();
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('ventas.clientes.show', ["clientes" => Cliente::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("ventas.clientes.edit", ["clientes" => Cliente::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteFormRequest $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->tipo_persona = $request->get('tipo_persona');
        $cliente->nombre = $request->get('nombre');
        $cliente->tipo_documento = $request->get('tipo_documento');
        $cliente->num_documento = $request->get('num_documento');
        $cliente->direccion = $request->get('direccion');
        $cliente->telefono = $request->get('telefono');
        $cliente->email = $request->get('email');
        $cliente->update();
        return Redirect::to('ventas/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $categoria, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->status = '0';
        $cliente->update();
        return Redirect::to('ventas/clientes');
    }
}
