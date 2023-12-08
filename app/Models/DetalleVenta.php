<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_detalle_venta';
    protected $table = 'detalle_venta';

    protected $fillable = [
        'id_detalle_venta',
        'venta_id',
        'producto_id',
        'cantidad',
        'precio_venta',
        'descuento',
    ];
}
