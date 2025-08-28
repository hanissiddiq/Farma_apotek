<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            if($request->hasFile('icon')){

                $iconPath = $request->file('icon')->store('category_icons', 'public');
                $validated['icon'] = $iconPath;
            }
            $validated['slug'] = Str::slug($request->name);
            //obat lambung => obat-lambung
            $newCategory = Category::create($validated);

            //ketika berhasil simpan
            DB::commit();

            return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'icon' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            if($request->hasFile('icon')){

                $iconPath = $request->file('icon')->store('category_icons', 'public');
                $validated['icon'] = $iconPath;
            }
            $validated['slug'] = Str::slug($request->name);
            //obat lambung => obat-lambung
            $category->update($validated);

            //ketika berhasil simpan
            DB::commit();

            return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
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
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            // Hapus file ikon jika ada


            $category->delete();

            return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
           DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System Error!',$e->getMessage()],
            ]);
            throw $error;
        }
    }
}
