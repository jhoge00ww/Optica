<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'order',
        'description',
        'quantity',
        'unit_price',
    ];
    public function invoice()
    {
        return $this->belongsTo(\App\Models\Invoice::class);
    }
}
