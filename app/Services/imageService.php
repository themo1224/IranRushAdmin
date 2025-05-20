<?php

namespace App\Services;

use App\Models\Media;
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
        
        $media = Media::create([
            'file_name' => $filename,
            'file_path' => $path,
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
        ]);

        return $media; // Return the media object

    }
}
