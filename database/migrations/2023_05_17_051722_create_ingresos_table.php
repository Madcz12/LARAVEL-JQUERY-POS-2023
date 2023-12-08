<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->bigIncrements('id_ingreso');
            $table->unsignedBigInteger('ingreso_id');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('ingreso_id')->references('id_ingreso')->on('ingresos')->onDelete('cascade');
            $table->foreign('producto_id')->references('id_producto')->on('productos')->onDelete('cascade');
            $table->integer('cantidad');
            $table->decimal('precio_compra', 11, 2);
            $table->decimal('precio_venta', 11, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresos');
    }
};
