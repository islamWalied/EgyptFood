<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product_images.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new ProductImage(); // استبدل هذا بعملية جلب الصور من قاعدة البيانات
        $products = Product::pluck('name' , 'id')->toArray();
        return view('admin.product_images.create' , compact('product' , 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */


public function store(Request $request)
{
    // (اختياري) فالياديشن خفيف
    $request->validate([
        'product_id' => ['required','exists:products,id'],
        'path.*'     => ['nullable','image','mimes:jpeg,png,jpg,webp','max:5120'],
    ]);

    $product = Product::findOrFail($request->product_id);

    if ($request->hasFile('path')) {
        $i = 0;
        foreach ($request->file('path') as $file) {
            $storedPath = $file->store('product_images', 'public');
            $product->images()->create([
                'path'       => $storedPath,
                'sort_order' => $i++,
                // بدون primary بناءً على طلبك
            ]);
        }
    }

    return back()->with('ok','تم الحفظ');
}


    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $product = Product::with('images')->findOrFail($id);
        // dd($product);
        $products = Product::pluck('name' , 'id')->toArray();
        $path = $product->images->pluck('path')->toArray();


        // dd("done");


        return view('admin.product_images.edit' , compact('path' , 'product' , 'products'));
    }

    /**
     * Update the specified resource in storage.
     */

public function update(Request $request, $id)
{
    // dd($id) ;
    $product = Product::with('images')->findOrFail($id);
    // احذف الصور القديمة المتعلَّم عليها (لو موجودة)
    $removeIds = $request->input('remove_ids', []);

    if (!empty($removeIds)) {
        $toDelete = $product->images()->whereIn('id', $removeIds)->get();
        foreach ($toDelete as $img) {
            Storage::disk('public')->delete($img->path);
            $img->delete();
        }
    }

    if ($request->hasFile('path')) {
        $startOrder = (int) $product->images()->max('sort_order');
        $i = 0;
        foreach ($request->file('path') as $file) {
            $storedPath = $file->store('product_images', 'public');
            $product->images()->create([
                'path'       => $storedPath,
                'sort_order' => $startOrder + (++$i),
            ]);
        }
    }
dd("done");
    return back()->with('ok','تم تحديث الصور');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
