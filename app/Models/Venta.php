<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = ['cliente_id', 'fecha', 'total'];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    // Relación con el modelo Detalleventa
    public function detalleventas()
    {
        return $this->hasMany(Detalleventa::class);
    }
}
