<?php

namespace App\Services\Interface;

interface CategoryService
{
    public function index($query, $limit);

    public function show($category);

    public function store($request);

    public function update($request, $category);

    public function delete($category);
}
