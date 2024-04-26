<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

    public function find($id);

    public function getAll();

    // Other method declarations...
}
