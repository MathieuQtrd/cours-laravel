<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'category',
        'image',
        'description',
        'stock',
        'price',
        'color',
        'size',
    ];
}
