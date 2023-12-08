<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_detalle_ingreso';
    protected $table = 'detalle_ingresos';

    protected $fillable = [
        'id_detalle_ingreso',
        'ingreso_id',
        'producto_id',
        'cantidad',
        'precio_compra',
        'precio_venta',
    ];
}
