<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $fillable = [
        'factory_name',
        'drektor',
        'phone',
        'addres',
        'paymart',
        'status',
        'check_messege',
    ];
}
