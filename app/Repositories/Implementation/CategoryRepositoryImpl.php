<?php

namespace App\Repositories\Implementation;

use App\Models\Category;
use App\Repositories\Interface\CategoryRepository;
use Illuminate\Support\Facades\Log;

class CategoryRepositoryImpl implements CategoryRepository
{
    public function getPaginated($query, $limit)
    {
        try {
            return Category::when($query, function ($q) use ($query) {
                return $q->where('name', 'like', "%{$query}%");
            })->paginate($limit);
        } catch (\Exception $e) {
            Log::error('Repository: Error fetching categories: ' . $e->getMessage());
            throw $e;
        }
    }

    public function find($id)
    {
        try {
            return Category::findOrFail($id);
        } catch (\Exception $e) {
            Log::error('Repository: Error fetching category: ' . $e->getMessage());
            throw $e;
        }
    }

    public function create($data)
    {
        try {
            return Category::create($data);
        } catch (\Exception $e) {
            Log::error('Repository: Error creating category: ' . $e->getMessage());
            throw $e;
        }
    }

    public function update($id, $data)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update($data);
            return $category;
        } catch (\Exception $e) {
            Log::error('Repository: Error updating category: ' . $e->getMessage());
            throw $e;
        }
    }

    public function delete($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return true;
        } catch (\Exception $e) {
            Log::error('Repository: Error deleting category: ' . $e->getMessage());
            throw $e;
        }
    }
}
