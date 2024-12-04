<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('donaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_donante');
            $table->decimal('cantidad', 10, 2);
            $table->date('fecha_donacion');
            $table->string('metodo_donacion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('donaciones');
    }

};
