<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = [
        'title',
        'author',
        'price',
        'event_date',
        'main_img',
        'slug',
        'content',
        'short_content',
        'publish_date',
        'category_id',
    ];
    
    protected $casts = [
        'publish_date' => 'date', 
        'event_date' => 'date', 
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getMainImgUrlAttribute()
    {
        if($this->main_img) {
            return Storage::url($this->main_img); // url de la photo
        }
        return asset('images/defaut_photo.png');
    }

}
