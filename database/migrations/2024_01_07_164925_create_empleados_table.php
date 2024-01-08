<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombreEm');
            $table->string('apellidoEm');
            $table->date('fecha_nacimiento');
            $table->integer('cantidadHijos');
            $table->integer('sueldo');
            $table->boolean('estado')->default(true);
            $table->foreignId('fabri_id')->constrained('fabricas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
