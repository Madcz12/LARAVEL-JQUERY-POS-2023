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
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id_producto'); // llave primaria
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id_categoria')->on('categorias')->onDelete('cascade');
            $table->string('codigo_prod', 50);
            $table->string('nombre_prod', 100);
            $table->integer('stock');
            $table->text('descripcion', 30);
            $table->string('imagen_prod', 50);
            $table->string('estado', 20);
            /* $table->timestamps(); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
