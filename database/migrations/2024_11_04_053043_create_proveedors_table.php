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
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->text('nombre'); // Nombre del proveedor
            $table->text('contacto')->nullable(); // Nombre de contacto del proveedor (opcional)
            $table->string('telefono')->nullable(); // Teléfono del proveedor (opcional)
            $table->timestamps(); // Campos de marcas de tiempo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedors');
    }
};
