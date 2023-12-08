<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Venta;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class VentaController extends Controller
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
            $ventas = DB::table('ventas as v')
                ->join('clientes as c', 'v.cliente_id', '=', 'c.id_cliente')
                ->join('detalle_venta as dv', 'dv.venta_id', '=', 'v.id_ventas')
                ->select('v.id_ventas', 'v.fecha_hora', 'c.nombre', 'v.tipo_comprobante', 'v.num_comprobante', 'v.impuesto', 'v.estado', 'v.total_venta')
                ->where('v.num_comprobante', 'LIKE', '%' . $query . '%')
                ->groupBy('v.id_ventas', 'v.fecha_hora', 'c.nombre', 'v.tipo_comprobante', 'v.num_comprobante', 'v.impuesto', 'v.estado')
                ->orderBy('v.id_ventas', 'desc')
                ->paginate(15);
            return view('ventas.venta.index', ["ventas" => $ventas, "texto" => $query]);
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
        $clientes = DB::table('clientes')->where('tipo_persona', '=', 'CLIENTE')->get();
        $productos = DB::table('productos as p')
            ->join('detalle_ingresos as di', 'di.producto_id', '=', 'p.id_producto')
            ->select(DB::raw('CONCAT(p.codigo_prod, p.nombre_prod) AS articulo'), 'p.id_producto', 'p.stock', DB::raw('avg(di.precio_venta) as precio_promedio'))
            ->where('p.estado', '=', 'Activo')
            ->where('p.stock', '>', '0')
            ->groupBy('articulo', 'p.id_producto', 'p.stock')
            ->get();
        return view("ventas.venta.create", ["clientes" => $clientes, "productos" => $productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* public function store(Request $request)

    {
        $venta = new Venta;
        $venta->cliente_id = $request->get('cliente_id');
        $venta->tipo_comprobante = $request->get('tipo_documento');
        $venta->num_comprobante = $request->get('num_documento');
        $venta->total_venta = $request->get('total_venta');
        $mytime = Carbon::now('America/Caracas');
        $venta->fecha_hora = $mytime->toDateTimeString();
        $venta->impuesto = 12;
        $venta->estado = 'Activo';
        $venta->save();

        $id_producto = explode(',', $request->get('pidarticulo'));
        $cantidad = $request->get('cantidad');
        $descuento = $request->get('pdescuento');
        $precio_venta = $request->get('precio_venta');

        $cont = 0;
        while ($cont < count($id_producto)) {
            $detalle = new DetalleVenta();
            $detalle->venta_id = $venta->id_ventas;
            $detalle->producto_id = $id_producto[$cont];
            $detalle->cantidad = $cantidad[$cont];
            $detalle->descuento = $descuento[$cont];
            $detalle->precio_venta = $precio_venta[$cont];
            $detalle->save();
            $cont = $cont + 1;
        }
        return Redirect::to('ventas/venta');
    } */
    public function store(Request $request)

    {

        /* DB::beginTransaction(); */
        $venta = new Venta;
        $venta->cliente_id = $request->get('cliente_id');
        $venta->tipo_comprobante = $request->get('tipo_documento');
        $venta->num_comprobante = $request->get('num_documento');
        $venta->total_venta = $request->get('total_venta');
        $mytime = Carbon::now('America/Caracas');
        $venta->fecha_hora = $mytime->toDateTimeString();
        $venta->impuesto = 12;
        $venta->estado = 'Activo';
        $venta->save();

        $id_producto = explode(',', $request->get('pidarticulo'));
        $stock = strtok('_');
        $precio_promedio = strtok('_');

        $cantidad = $request->get('cantidad');
        $descuento = $request->get('pdescuento');
        $precio_venta = $request->get('precio_venta');

        $cont = 0;
        while ($cont < count($id_producto)) {
            $detalle = new DetalleVenta();
            $detalle->venta_id = $venta->id;
            $detalle->producto_id = $detalle->producto_id = intval($id_producto);
            $detalle->cantidad = $cantidad[$cont];
            $detalle->descuento = $descuento[$cont];
            $detalle->precio_venta = $precio_venta[$cont];
            $detalle->save();
            $cont = $cont + 1;
        }
        /* DB::commit(); */
        return Redirect::to('ventas/venta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ventas = DB::table('ventas as v')
            ->join('clientes as c', 'v.cliente_id', '=', 'c.id_cliente')
            ->join('detalle_venta as dv', 'v.id_ventas', '=', 'dv.venta_id')
            ->select('v.id_ventas', 'v.fecha_hora', 'c.nombre', 'v.tipo_comprobante', 'v.num_comprobante', 'v.impuesto', 'v.estado', 'v.total_venta')
            ->where('v.id_ventas', '=', $id)
            ->first();

        $detalles = DB::table('detalle_venta as d')
            ->join('productos as p', 'd.producto_id', '=', 'p.id_producto')
            ->select('p.nombre_prod as productos', 'd.cantidad', 'd.precio_compra', 'd.precio_venta')
            ->where('d.venta_id', '=', $id)
            ->get();
        return view("ventas.venta.show", ["ingresos" => $ventas, "detalles" => $detalles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->estado = 'C';
        $venta->update();
        return Redirect::to('ventas/venta');
    }
}
