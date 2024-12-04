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
        Schema::create('empleados_voluntarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('rol', ['Empleado', 'Voluntario']);
            $table->date('fecha_ingreso');
            $table->string('telefono');
            $table->string('correo_electronico');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleados_voluntarios');
    }

};
