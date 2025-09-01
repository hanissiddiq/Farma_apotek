<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', [ 'products' => $products ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //
        $validated = $request->validate([
            'name' => 'required|string',
            'about' => 'required|string',
            'category_id' => 'required|integer',
            'price' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            if($request->hasFile('photo')){

                $photoPath = $request->file('photo')->store('product_photos', 'public');
                $validated['photo'] = $photoPath;
            }
            $validated['slug'] = Str::slug($request->name);
            $newProduct = Product::create($validated);

            //ketika berhasil simpan
            DB::commit();

            return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            //ketika gagal simpan
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System Error!',$e->getMessage()],
            ]);
            throw $error;
            // return redirect()->back()->with('error', 'Failed to create category.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
