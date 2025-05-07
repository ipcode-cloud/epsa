<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock_in extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'product_id',
        'quantity',
        'unit_price',
        'total_price',
        'date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
