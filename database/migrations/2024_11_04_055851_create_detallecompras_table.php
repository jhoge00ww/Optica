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
        Schema::create('detallecompras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('compra_id')->constrained('compras')->onDelete('cascade'); // Relación con compras
            $table->foreignId('montura_id')->constrained('monturas')->onDelete('cascade'); // Relación con monturas
            $table->foreignId('lente_id')->constrained('lentes')->onDelete('cascade'); // Relación con lentes
            $table->integer('cantidad'); // Cantidad de artículos
            $table->decimal('precio_unitario', 10, 2); // Precio unitario
            $table->timestamps(); // Campos de marcas de tiempo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallecompras');
    }
};
