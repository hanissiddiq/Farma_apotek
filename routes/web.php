<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductTransactionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontController;
use App\Models\ProductTransaction;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/search',[FrontController::class, 'search'])->name('front.search');
Route::get('/details/{product:slug}',[FrontController::class, 'details'])->name('front.product.details');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('carts', CartController::class)->middleware('role:buyer');
    Route::post('carts/add/{productId}', [CartController::class, 'store'])->name('carts.store')->middleware('role:buyer');

    Route::resource('product_transactions', ProductTransactionController::class)->middleware('role:owner|owner|buyer');


    Route::prefix('admin')->name('admin.')->group(function(){
        Route::resource('products', ProductController::class)->middleware('role:owner');
        Route::resource('categories', CategoryController::class)->middleware('role:owner');
    });
});

require __DIR__.'/auth.php';
