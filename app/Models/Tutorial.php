<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'embed_aparat_url', 
        'text_area', 
        'title', 
        'slug', 
        'meta_title', 
        'meta_description', 
        'meta_keywords', 
        'canonical_url', 
        'indexable', 
        'author_id', 
        'image_id'
    ];
    
    public function  user(){
        return $this->belongsTo(User::class);
    }
    public function  media(){
        return $this->belongsTo(Media::class, 'media_id');
    }
}
