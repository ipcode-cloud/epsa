<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock_in extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'product_in_id',
        'quantity',
        'date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
