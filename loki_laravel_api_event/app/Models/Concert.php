<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'capacity',
        'price',
        'image',
    ];
}
