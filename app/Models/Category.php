<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'parent_id',
        'media_id',
    ];

    // Define relationship for child categories
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Recursive relationship for nested categories
    public function childrenRecursive()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('childrenRecursive');
    }

    // Relationship for associated media
    public function media()
    {
        return $this->belongsTo(Media::class, 'media_id', 'id');
    }
}
