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
            $table->string('nombre'); // Nombre del empleado
            $table->string('apellido'); // Apellido del empleado
            $table->string('correo')->unique(); // Correo electrónico único
            $table->string('telefono')->nullable(); // Teléfono del empleado (opcional)
            $table->foreignId('sucursal_id')->constrained('sucursals')->onDelete('cascade'); // Relación con sucursales
            $table->timestamps(); // Campos de marcas de tiempo
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
