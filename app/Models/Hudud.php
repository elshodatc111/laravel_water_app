<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hudud extends Model
{
    protected $fillable = [
        'factory_id',
        'hudud_name',
        'status',
        'muljal'
    ];
}