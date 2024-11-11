<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $fillable = [
        'series',
        'number',
        'issuance_date',
        'due_date',
    ];
    public function items()
    {
        return $this->hasMany(\App\Models\InvoiceItem::class);
    }
}
