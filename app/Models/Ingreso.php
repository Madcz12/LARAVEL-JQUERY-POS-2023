<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_ingreso';
    protected $table = 'ingresos';

    protected $fillable = [
        'id_ingreso',
        'proveedor_id',
        'tipo_comprobante',
        'num_comprobante',
        'fecha_hora',
        'impuesto',
        'estado',
    ];
}
