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
        Schema::create('detalles_ventas', function (Blueprint $table) {
            $table->id(); // Crea el campo 'id' con incremento automático
            $table->foreignId('venta_id')->constrained('ventas'); // Llave foránea a 'ventas'
            $table->foreignId('montura_id')->constrained('monturas'); // Llave foránea a 'monturas'
            $table->foreignId('lente_id')->constrained('lentes'); // Llave foránea a 'lentes'
            $table->integer('cantidad'); // Campo para la cantidad
            $table->decimal('precio_unitario', 10, 2); // Campo para el precio unitario
            $table->timestamps(); // Campos para 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalleventas');
    }
};
