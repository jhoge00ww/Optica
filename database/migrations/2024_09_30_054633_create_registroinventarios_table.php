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
        Schema::create('registroinventarios', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' tipo BIGINT AUTO_INCREMENT (NOT NULL por defecto)
            $table->text('producto'); // Crea una columna 'producto' tipo TEXT (NOT NULL por defecto)
            $table->text('categoria'); // Crea una columna 'categoria' tipo TEXT (NOT NULL por defecto)
            $table->integer('cantidad_vendida'); // Crea una columna 'cantidad_vendida' tipo INT (NOT NULL por defecto)
            $table->timestamp('fecha_registro')->useCurrent(); // Crea una columna 'fecha_registro' tipo TIMESTAMP con valor por defecto actual
            $table->timestamps(); // Crea columnas 'created_at' y 'updated_at' (NOT NULL por defecto)

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registroinventarios');
    }
};
