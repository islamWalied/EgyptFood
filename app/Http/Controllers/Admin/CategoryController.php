<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\Interface\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $query = $request->input('query');
        $limit = $request->input('limit', 10);
        return $this->categoryService->index($query, $limit);
    }

    public function show($id)
    {
        return $this->categoryService->show($id);
    }

    public function create()
    {
        $categories = Category::whereNull('category_id')->get();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        return $this->categoryService->store($request);
    }

    public function edit($id)
    {
        $response = $this->categoryService->show($id);
        $categories = Category::whereNull('category_id')->where('id', '!=', $id)->get();
        return view('admin.categories.edit', [
            'category' => $response->getData()['item'],
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        return $this->categoryService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->categoryService->delete($id);
    }
}
