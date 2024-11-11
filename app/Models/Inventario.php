<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = ['montura_id', 'lente_id', 'sucursal_id', 'cantidad'];

    public function montura()
    {
        return $this->belongsTo(Montura::class);
    }

    public function lente()
    {
        return $this->belongsTo(Lente::class);
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }
}
