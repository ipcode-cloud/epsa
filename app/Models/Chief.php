<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Chief extends Authenticatable
{
    // protected $table = 'chiefs';
    protected $primaryKey = 'chief_id';
    // public $timestamps = false;

    protected $fillable = [
        'user_name',
        'email',
        'password',
    ];
}
