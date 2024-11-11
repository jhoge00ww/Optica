<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = ['nombre', 'apellido', 'correo', 'telefono', 'sucursal_id'];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }
}
