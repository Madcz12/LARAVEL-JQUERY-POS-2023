<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
            ['CLASE' => 'ZD', 'DESCRIPCION' => 'descripcion uno', 'GRUPO' => 'ARTICULO', 'CRITICIDAD' => 1, 'STATUS' => 'Pendiente', 'CREADO_POR' => 'mdiamond', 'created_at' => '2023-01-02 15:12:30'],
            ['CLASE' => 'C1', 'DESCRIPCION' => 'descripcion dos', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 1, 'STATUS' => 'Cerrada', 'CREADO_POR' => 'mdiamond', 'created_at' => '2021-01-11 15:12:30'],
            ['CLASE' => 'WF', 'DESCRIPCION' => 'descripcion tres', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 0, 'STATUS' => 'Anulado', 'CREADO_POR' => 'mdiamond', 'created_at' => '2012-09-07 15:12:30'],
            ['CLASE' => 'AA', 'DESCRIPCION' => 'descripcion cuatro', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 0, 'STATUS' => 'Aprobado', 'CREADO_POR' => 'mdiamond', 'created_at' => '2015-06-09 15:12:30'],
            ['CLASE' => 'OP', 'DESCRIPCION' => 'descripcion cinco', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 0, 'STATUS' => 'Pendiente', 'CREADO_POR' => 'mdiamond', 'created_at' => '2013-06-12 15:12:30'],
            ['CLASE' => 'SK', 'DESCRIPCION' => 'descripcion seis', 'GRUPO' => 'ARTICULO', 'CRITICIDAD' => 0, 'STATUS' => 'Pendiente', 'CREADO_POR' => 'mdiamond', 'created_at' => '2013-03-12 15:12:30'],
            ['CLASE' => 'JH', 'DESCRIPCION' => 'descripcion siete', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 0, 'STATUS' => 'Pendiente', 'CREADO_POR' => 'mdiamond', 'created_at' => '2013-05-08 15:12:30'],
            ['CLASE' => 'GF', 'DESCRIPCION' => 'descripcion ocho', 'GRUPO' => 'ARTICULO', 'CRITICIDAD' => 0, 'STATUS' => 'Pendiente', 'CREADO_POR' => 'mdiamond', 'created_at' => '2021-05-07 15:12:30'],
            ['CLASE' => 'QW', 'DESCRIPCION' => 'descripcion nueve', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 1, 'STATUS' => 'Pendiente', 'CREADO_POR' => 'mdiamond', 'created_at' => '2020-05-10 15:12:30'],
            ['CLASE' => 'WR', 'DESCRIPCION' => 'descripcion diez', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 1, 'STATUS' => 'Cerrada', 'CREADO_POR' => 'mdiamond', 'created_at' => '2020-04-10 15:12:30'],
            ['CLASE' => 'AL', 'DESCRIPCION' => 'descripcion once', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 1, 'STATUS' => 'Cerrada', 'CREADO_POR' => 'mdiamond', 'created_at' => '2018-04-21 15:12:30'],
            ['CLASE' => 'BV', 'DESCRIPCION' => 'descripcion doce', 'GRUPO' => 'ARTICULO', 'CRITICIDAD' => 1, 'STATUS' => 'Cerrada', 'CREADO_POR' => 'mdiamond', 'created_at' => '2018-01-20 15:12:30'],
            ['CLASE' => 'SH', 'DESCRIPCION' => 'descripcion trece', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 1, 'STATUS' => 'Cerrada', 'CREADO_POR' => 'mdiamond', 'created_at' => '2017-10-17 15:12:30'],
            ['CLASE' => 'EG', 'DESCRIPCION' => 'descripcion catorce', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 1, 'STATUS' => 'Pendiente', 'CREADO_POR' => 'mdiamond', 'created_at' => '2017-10-15 15:12:30'],
            ['CLASE' => 'PS', 'DESCRIPCION' => 'descripcion quince', 'GRUPO' => 'ARTICULO', 'CRITICIDAD' => 0, 'STATUS' => 'Pendiente', 'CREADO_POR' => 'mdiamond', 'created_at' => '2016-12-26 15:12:30'],
            ['CLASE' => 'CL', 'DESCRIPCION' => 'descripcion dieciseis', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 1, 'STATUS' => 'Pendiente', 'CREADO_POR' => 'mdiamond', 'created_at' => '2016-11-01 15:12:30'],
            ['CLASE' => 'CC', 'DESCRIPCION' => 'descripcion diecisiete', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 1, 'STATUS' => 'Pendiente', 'CREADO_POR' => 'mdiamond', 'created_at' => '2010-11-05 15:12:30'],
            ['CLASE' => 'TW', 'DESCRIPCION' => 'descripcion dieciocho', 'GRUPO' => 'ARTICULO', 'CRITICIDAD' => 1, 'STATUS' => 'Anulado', 'CREADO_POR' => 'mdiamond', 'created_at' => '2013-11-14 15:12:30'],
            ['CLASE' => 'JN', 'DESCRIPCION' => 'descripcion diecinueve', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 1, 'STATUS' => 'Anulado', 'CREADO_POR' => 'mdiamond', 'created_at' => '2013-11-22 15:12:30'],
            ['CLASE' => 'WW', 'DESCRIPCION' => 'descripcion viente', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 0, 'STATUS' => 'Pendiente', 'CREADO_POR' => 'mdiamond', 'created_at' => '2010-10-06 15:12:30'],
            ['CLASE' => 'WK', 'DESCRIPCION' => 'descripcion veintiuno', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 1, 'STATUS' => 'Anulado', 'CREADO_POR' => 'mdiamond', 'created_at' => '2010-06-22 15:12:30'],
            ['CLASE' => 'SS', 'DESCRIPCION' => 'descripcion veintidos', 'GRUPO' => 'ARTICULO', 'CRITICIDAD' => 1, 'STATUS' => 'Cerrada', 'CREADO_POR' => 'mdiamond', 'created_at' => '2010-09-31 15:12:30'],
            ['CLASE' => 'DI', 'DESCRIPCION' => 'descripcion veintitres', 'GRUPO' => 'ARTICULO', 'CRITICIDAD' => 0, 'STATUS' => 'Anulado', 'CREADO_POR' => 'mdiamond', 'created_at' => '2012-09-29 15:12:30'],
            ['CLASE' => 'RE', 'DESCRIPCION' => 'descripcion veinticuatro', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 1, 'STATUS' => 'Cerrada', 'CREADO_POR' => 'mdiamond', 'created_at' => '2012-07-05 15:12:30'],
            ['CLASE' => 'QR', 'DESCRIPCION' => 'descripcion veinticinco', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 1, 'STATUS' => 'Pendiente', 'CREADO_POR' => 'mdiamond', 'created_at' => '2023-07-27 15:12:30'],
            ['CLASE' => 'LL', 'DESCRIPCION' => 'descripcion veintiseis', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 0, 'STATUS' => 'Pendiente', 'CREADO_POR' => 'mdiamond', 'created_at' => '2023-07-21 15:12:30'],
            ['CLASE' => 'KV', 'DESCRIPCION' => 'descripcion veintisiete', 'GRUPO' => 'ARTICULO', 'CRITICIDAD' => 1, 'STATUS' => 'Aprobado', 'CREADO_POR' => 'mdiamond', 'created_at' => '2023-07-15 15:12:30'],
            ['CLASE' => 'AX', 'DESCRIPCION' => 'descripcion veintiocho', 'GRUPO' => 'ARTICULO', 'CRITICIDAD' => 0, 'STATUS' => 'Aprobado', 'CREADO_POR' => 'mdiamond', 'created_at' => '2023-05-12 15:12:30'],
            ['CLASE' => 'MM', 'DESCRIPCION' => 'descripcion veintinueve', 'GRUPO' => 'ARTICULO', 'CRITICIDAD' => 1, 'STATUS' => 'Aprobado', 'CREADO_POR' => 'mdiamond', 'created_at' => '2023-05-04 15:12:30'],
            ['CLASE' => 'MN', 'DESCRIPCION' => 'descripcion treinta', 'GRUPO' => 'PIEZA', 'CRITICIDAD' => 1, 'STATUS' => 'Cerrada', 'CREADO_POR' => 'mdiamond', 'created_at' => '2023-02-02 15:12:30'],
        ];
    }
}
