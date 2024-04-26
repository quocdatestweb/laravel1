<?php

namespace App\Interfaces;

interface PostCategoryRepositoryInterface
{
    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

    public function find($id);

    public function getAll();

    // Other method declarations...
}
