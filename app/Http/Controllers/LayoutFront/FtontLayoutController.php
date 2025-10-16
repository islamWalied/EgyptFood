<?php

namespace App\Http\Controllers\LayoutFront;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FtontLayoutController extends Controller
{
    public function forntHome(){

        $parents = Category::with('children')
            ->whereNull('category_id')
            ->orderBy('name')
            ->get();

        $subcategories = $parents->pluck('children')->flatten()->values();

    return view('front-layouts.index' , [
        'categories'    => $parents,       // ازرار الفلاتر
        'subcategories' => $subcategories, // الشبكة (بدل $products)
    ]);

}

public function forntProducts(Category $category)
{

    $categories = Category::with('children')
            ->whereNull('category_id')
            ->orderBy('name')
            ->get();
        $productsOneToMany = $category->products()->latest()->get() ?? collect();

        // لو عندك كمان (أو بدلًا من) Many-to-Many: جدول وسيط category_product
        $productsManyToMany = method_exists($category, 'productsMany')
            ? $category->productsMany()->latest()->get()
            : collect();

        // ندمج أي نتايج موجودة من العلاقتين (من غير تكرار)
        $products = $productsOneToMany->merge($productsManyToMany)->unique('id')->values();

        // للتبويب/الفلاتر: لو الابن ليه أبناء (مستوى ثالث) هنظهرهم كفلاتر اختيارية
        $children = $category->children()->orderBy('name')->get();

        return view('front-layouts.products', [
            'category' => $category,   // الصنف الابن الحالي
            'products' => $products,   // منتجات هذا الابن
            'children' => $children,
            'categories' => $categories   // لو عندك مستوى ثالث (اختياري للفلاتر)
        ]);
}


}
