<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_producto');
            $table->integer('cantidad_vendida');
            $table->date('fecha_venta');
            $table->unsignedBigInteger('id_cliente');
            $table->decimal('monto_total', 8, 2);
            $table->timestamps();

            // Opcional: Agregar claves foráneas si las tablas correspondientes existen
            // $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            // $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
