<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $table = 'products';
    protected $primaryKey = 'product_id';
    public $timestamps = false;

    protected $fillable = [
        'product_name',
    ];

    public function stockOuts()
    {
        return $this->hasMany(Stock_out::class, 'product_id', 'product_id');
    }
    public function stockIns()
    {
        return $this->hasMany(Stock_in::class, 'product_id', 'product_id');
    }


}
