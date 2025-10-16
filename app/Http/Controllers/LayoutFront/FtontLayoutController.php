<?php

namespace App\Http\Controllers\LayoutFront;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FtontLayoutController extends Controller
{
    public function forntHome(){

        $categories = Category::all();
        $products = Product::all();

    return view('front-layouts.index' , compact('categories' , 'products'));

}
}
