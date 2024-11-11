<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = ['proveedor_id', 'fecha', 'total'];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
