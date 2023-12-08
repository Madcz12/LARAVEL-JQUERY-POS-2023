<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngresoFormRequest;
use App\Models\DetalleIngreso;
use App\Models\Ingreso;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Response;


class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('texto'));
            $ingresos = DB::table('ingresos as i')
                ->join('clientes as c', 'i.proveedor_id', '=', 'id_cliente')
                ->join('detalle_ingresos as di', 'di.ingreso_id', '=', 'i.id_ingreso')
                ->select('i.id_ingreso', 'i.fecha_hora', 'c.nombre', 'i.tipo_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado', DB::raw('sum(di.cantidad*di.precio_compra) as total'))
                ->where('i.num_comprobante', 'LIKE', '%' . $query . '%')
                ->groupBy('i.id_ingreso', 'i.fecha_hora', 'c.nombre', 'i.tipo_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado')
                ->orderBy('i.id_ingreso', 'desc')
                ->paginate(15);
            return view('compras.ingreso.index', ["ingresos" => $ingresos, "texto" => $query]);
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
        $clientes = DB::table('clientes')->where('tipo_persona', '=', 'PROVEEDOR')->get();
        $ingresos = Ingreso::all();
        $productos = DB::table('productos as p')
            ->select(DB::raw('CONCAT(p.codigo_prod, p.nombre_prod) AS articulo'), 'p.id_producto', 'p.stock')
            ->where('p.estado', '=', 'Activo')
            ->get();
        return view("compras.ingreso.create", ["clientes" => $clientes, "productos" => $productos, "ingresos" => $ingresos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {

        /* DB::beginTransaction(); */
        $ingreso = new Ingreso;
        $ingreso->proveedor_id = $request->get('proveedor_id');
        $ingreso->tipo_comprobante = $request->get('tipo_documento');
        $ingreso->num_comprobante = $request->get('num_documento');
        $mytime = Carbon::now('America/Caracas');
        $ingreso->fecha_hora = $mytime->toDateTimeString();
        $ingreso->impuesto = 12;
        $ingreso->estado = 'Activo';
        $ingreso->save();

        $id_producto = explode(',', $request->get('pidarticulo'));
        $cantidad = $request->get('cantidad');
        $precio_compra = $request->get('precio_compra');
        $precio_venta = $request->get('precio_venta');


        $cont = 0;
        while ($cont < count($id_producto)) {
            $detalle = new DetalleIngreso;
            $detalle->ingreso_id = $ingreso->id_ingreso;
            $detalle->producto_id = $id_producto[$cont];
            $detalle->cantidad = $cantidad[$cont];
            $detalle->precio_compra = $precio_compra[$cont];
            $detalle->precio_venta = $precio_venta[$cont];
            $detalle->save();
            $cont = $cont + 1;
        }
        /* DB::commit(); */
        return Redirect::to('compras/ingreso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingresos = DB::table('ingresos as i')
            ->join('clientes as c', 'i.proveedor_id', '=', 'c.id_cliente')
            ->join('detalle_ingresos as di', 'di.ingreso_id', '=', 'i.id_ingreso')
            ->select('i.id_ingreso', 'i.fecha_hora', 'c.nombre', 'i.tipo_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado', DB::raw('sum(di.cantidad*di.precio_compra) as total'))
            ->where('i.id_ingreso', '=', $id)
            ->groupBy('i.id_ingreso', 'i.fecha_hora', 'c.nombre', 'i.tipo_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado')
            ->orderBy('i.id_ingreso', 'desc')
            ->first();

        $detalles = DB::table('detalle_ingresos as d')
            ->join('productos as p', 'd.producto_id', '=', 'p.id_producto')
            ->select('p.nombre_prod as productos', 'd.cantidad', 'd.precio_compra', 'd.precio_venta')
            ->where('d.ingreso_id', '=', $id)
            ->get();
        return view("compras.ingreso.show", ["ingresos" => $ingresos, "detalles" => $detalles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingreso $ingreso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingreso $ingreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingresos = Ingreso::findOrFail($id);
        $ingresos->estado = 'C';
        $ingresos->update();
        return Redirect::to('compras/ingreso');
    }
}
