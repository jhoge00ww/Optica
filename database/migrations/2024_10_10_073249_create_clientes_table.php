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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id(); // Esto crea una columna BIGINT auto incremental para 'id'
            $table->string('nombre', 255); // VARCHAR(255) para 'nombre'
            $table->string('apellido', 255); // VARCHAR(255) para 'apellido'
            $table->string('correo', 255)->unique(); // VARCHAR(255) con UNIQUE para 'correo'
            $table->string('telefono', 20)->nullable(); // VARCHAR(20) para 'telefono', puede ser null
            $table->timestamps(); // Esto crea las columnas 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
