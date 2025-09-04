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
        return view('front.index');
    }
}
