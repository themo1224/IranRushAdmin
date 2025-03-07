<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    public function uploadImage($file, $folder = 'tutorials')
    {
        if (!$file) {
            return null; // No file uploaded
        }

        // Generate unique filename
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        // Store image in the specified folder
        $path = $file->storeAs($folder, $filename, 'public');
        

        return $path; // Return stored file path
    }
}
