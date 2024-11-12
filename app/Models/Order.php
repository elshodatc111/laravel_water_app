<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    protected $fillable = [
        'factory_id',
        'hudud_id',
        'name',
        'phone',
        'addres',
        'count',
        'user_email',
        'status'
    ];
}
