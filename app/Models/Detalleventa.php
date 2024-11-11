<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalleventa extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = ['venta_id', 'montura_id', 'lente_id', 'cantidad', 'precio_unitario'];

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id');
    }

    // Relación con el modelo Montura
    public function montura()
    {
        return $this->belongsTo(Montura::class);
    }

    // Relación con el modelo Lente
    public function lente()
    {
        return $this->belongsTo(Lente::class);
    }
}
