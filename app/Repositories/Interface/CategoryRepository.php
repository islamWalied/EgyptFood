<?php

namespace App\Repositories\Interface;

interface CategoryRepository
{
    public function getPaginated($query, $limit);

    public function find($id);

    public function create($data);

    public function update($id, $data);

    public function delete($id);
}
