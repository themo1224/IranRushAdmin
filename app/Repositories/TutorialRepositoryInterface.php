<?php

namespace App\Repositories;

use App\Models\Tutorial;

interface TutorialRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}