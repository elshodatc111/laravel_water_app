<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balans extends Model{
    protected $fillable = [
        'factory_id',
        'messege',
        'hisoblandi',
        'tolandi',
    ];
}