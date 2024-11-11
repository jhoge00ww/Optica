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
        Schema::create('monturas', function (Blueprint $table) {
            $table->id(); // Crea el campo 'id' con incremento automático
            $table->text('modelo'); // Campo para el modelo
            $table->text('marca'); // Campo para la marca
            $table->decimal('precio', 10, 2); // Campo para el precio
            $table->integer('inventario'); // Campo para la cantidad en inventario
            $table->timestamps(); // Campos para 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monturas');
    }
};
