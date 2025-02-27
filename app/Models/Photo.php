<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\AssetStatus;


class Photo extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => AssetStatus::class,
    ];

    // Define relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
