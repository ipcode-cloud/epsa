<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chief extends Model
{
    // protected $table = 'chiefs';
    protected $primaryKey = 'chief_id';
    public $timestamps = false;

    protected $fillable = [
        'user_name',
        'email',
        'password',
    ];
}
