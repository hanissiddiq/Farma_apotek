<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderBy('id','DESC')->take(6)->get();
        $category = Category::all(); // Fetch or define your products here
        return view('front.index',[
            'products' => $products,
            'categories' => $category
        ]);
    }

    public function details(Product $product)
    {
        // dd($product);
        return view('front.details',[
            'product' => $product
        ]);
    }

    public function category(Category $category)
    {
        $products = Product::where('category_id', $category->id)->with('category')->get();
        $categories = Category::all();
        return view('front.category', [
            'products' => $products,
            'categories' => $categories,
            'category' => $category
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Product::where('name', 'LIKE', "%".$keyword."%")
                            ->get();

        return view('front.search', [
            'products' => $products,
            'keyword' => $keyword
        ]);
    }
}
