<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getImageUrlAttribute()
    {
        if($this->image) {
            return Storage::url($this->image); // url de la photo
        }
        return asset('images/defaut_photo.png');
    }
}
