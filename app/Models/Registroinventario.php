<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registroinventario extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = ['producto', 'categoria', 'cantidad_vendida', 'fecha_registro'];
}
