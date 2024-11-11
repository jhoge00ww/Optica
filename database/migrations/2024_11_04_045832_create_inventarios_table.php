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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('montura_id')->constrained('monturas')->onDelete('cascade'); // Relación con monturas
            $table->foreignId('lente_id')->constrained('lentes')->onDelete('cascade'); // Relación con lentes
            $table->foreignId('sucursal_id')->constrained('sucursals')->onDelete('cascade'); // Cambiar a 'sucursals'
            $table->integer('cantidad')->unsigned(); // Cantidad de artículos
            $table->timestamps(); // Campos de marcas de tiempo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
