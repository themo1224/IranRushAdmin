<?php

namespace App\Repositories;

use App\Models\Tutorial;

class TutorialRepository implements TutorialRepositoryInterface
{
    public function all()
    {
        return Tutorial::all();
    }

    public function find($id)
    {
        return Tutorial::findOrFail($id);
    }

    public function create(array $data)
    {
        return Tutorial::create([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'text_area' => $data['text_area'] ?? null,
            'embed_aparat_url' => $data['embed_aparat_url'] ?? null,
            'meta_title' => $data['meta_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'meta_keywords' => $data['meta_keywords'] ?? null,
            'canonical_url' => $data['canonical_url'] ?? null,
            'indexable' => $data['indexable'] ?? 1,
            'author_id' => $data['author_id'],
            'media_id' => $data['image_id'], // Save image path
        ]);
    }

    public function update($id, array $data)
    {
        $tutorial = Tutorial::findOrFail($id);
        $tutorial->update($data);
        return $tutorial;
    }

    public function delete($id)
    {
        $tutorial = Tutorial::findOrFail($id);
        $tutorial->delete();
        return true;
    }
}