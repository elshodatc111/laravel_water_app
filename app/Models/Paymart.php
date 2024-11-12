<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paymart extends Model{
    protected $fillable = [
        'factory_id',
        'summa',
        'type',
        'comment',
        'user',
    ];
}
