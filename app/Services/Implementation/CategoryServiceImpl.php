<?php

namespace App\Services\Implementation;

use App\Repositories\Interface\CategoryRepository;
use App\Services\Interface\CategoryService;
use App\Trait\WebResponseTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoryServiceImpl implements CategoryService
{
    use WebResponseTrait;

    protected CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index($query, $limit)
    {
        try {
            $categories = $this->categoryRepository->getPaginated($query, $limit);
            return $this->returnPaginatedData(
                'categories.index.success',
                200,
                $categories,
                'admin.categories.index');
        } catch (\Exception $e) {
            Log::error('Service: Error fetching categories: ' . $e->getMessage());
            return $this->returnError('categories.index.error', 500);
        }
    }

    public function show($category)
    {
        try {
            $category = $this->categoryRepository->find($category);
            return $this->returnData(
                'categories.show.success',
                200,
                $category,
                'admin.categories.show');
        } catch (\Exception $e) {
            Log::error('Service: Error fetching category: ' . $e->getMessage());
            return $this->returnError('categories.show.error', 404);
        }
    }

    public function store($request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'category_id' => 'nullable|exists:categories,id',
            ]);

            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('categories', 'public');
            }

            $category = $this->categoryRepository->create($validated);
            return $this->success('categories.store.success', 201, 'admin.categories.index');
        } catch (\Exception $e) {
            Log::error('Service: Error creating category: ' . $e->getMessage());
            return $this->returnError('categories.store.error', 500);
        }
    }

    public function update($request, $category)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'category_id' => 'nullable|exists:categories,id',
            ]);

            $categoryModel = $this->categoryRepository->find($category);
            if ($request->hasFile('image')) {
                if ($categoryModel->image) {
                    Storage::disk('public')->delete($categoryModel->image);
                }
                $validated['image'] = $request->file('image')->store('categories', 'public');
            } else {
                $validated['image'] = $categoryModel->image;
            }

            $category = $this->categoryRepository->update($category, $validated);
            return $this->success('categories.update.success', 200, 'admin.categories.index');
        } catch (\Exception $e) {
            Log::error('Service: Error updating category: ' . $e->getMessage());
            return $this->returnError('categories.update.error', 500);
        }
    }

    public function delete($category)
    {
        try {
            $categoryModel = $this->categoryRepository->find($category);
            if ($categoryModel->image) {
                Storage::disk('public')->delete($categoryModel->image);
            }
            $this->categoryRepository->delete($category);
            return $this->success('categories.delete.success', 200, 'admin.categories.index');
        } catch (\Exception $e) {
            Log::error('Service: Error deleting category: ' . $e->getMessage());
            return $this->returnError('categories.delete.error', 500);
        }
    }
}
