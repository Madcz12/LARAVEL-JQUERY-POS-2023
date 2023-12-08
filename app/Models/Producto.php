<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_producto';
    protected $table = 'productos';

    protected $fillable = [
        'id_producto',
        'categoria_id',
        'codigo_prod',
        'nombre_prod',
        'stock',
        'descripcion',
        'imagen',
        'estado',
        /*         'created_at',
        'updated_at', */
    ];
}
