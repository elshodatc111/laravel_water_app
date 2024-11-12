<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SendMessage extends Model
{
    protected $fillable = [
        'factory_id',
        'phone',
        'text',
    ];
}