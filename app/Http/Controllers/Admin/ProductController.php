<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private function getData(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            // 'status' => $request->input('status'),
            'category_id' => $request->input('category_id'),
        ];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            if ($file->isValid()) {
                $filename = $file->getClientOriginalName() . '_' . Carbon::now()->format('Y-m-d_H-i-s') . '.' . $file->getClientOriginalExtension();
                $folderName = $request->name;
                $path = $file->storeAs("products-images/$folderName", $filename, 'uploads');
                $data['image'] = $path;
            }
        }
        return $data;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('admin.products.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        $categories = Category::pluck('name' , 'id')->toArray();
        return view('admin.products.create' , compact('product' , 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $this->getData($request);
        Product::create($data);

        return redirect()->route('admin.products.index')->with('success' , 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show' , compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name' , 'id')->toArray();
        return view('admin.products.edit' , compact('product' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $this->getData($request);
        if ($request->hasFile('image')) {
            if (!empty($product->image) && file_exists(public_path($product->image))) {
                Storage::disk('uploads')->delete($product->image);
            }
        }
        $product->update($data);

        return redirect()->route('admin.products.index')->with('success' , 'Product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        if ($product->image) {
            Storage::disk('uploads')->delete($product->image);
            $folderName = dirname($product->image);
            if (Storage::disk('uploads')->exists($folderName)) {
                Storage::disk('uploads')->deleteDirectory($folderName);
            }
        }
        return redirect()->route('admin.products.index')->with('success' , 'Product deleted successfully');
    }
}
