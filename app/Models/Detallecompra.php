<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallecompra extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = ['compra_id', 'montura_id', 'lente_id', 'cantidad', 'precio_unitario'];
    // Relación con la tabla Compras
    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    // Relación con la tabla Monturas
    public function montura()
    {
        return $this->belongsTo(Montura::class);
    }

    // Relación con la tabla Lentes
    public function lente()
    {
        return $this->belongsTo(Lente::class);
    }
}
