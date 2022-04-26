<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewShopController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\productController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [NewShopController::class, 'index'])->name('home');
Route::get('/category-product', [NewShopController::class, 'categoryProduct'])->name('category');
Route::get('/mail-us', [NewShopController::class, 'mailUs'])->name('mail');


Route::get('/dashboard', [adminController::class, 'index'])->middleware(['auth'])->name('dashboard');

// Category controller
Route::get('/add-category', [categoryController::class, 'add_category'])->middleware(['auth'])->name('add-category');
Route::post('/add-category', [categoryController::class, 'save_category'])->name('add-category');
Route::get('/manage-category', [categoryController::class, 'manage_category'])->middleware(['auth'])->name('manage-category');
Route::get('/change-status/{id}', [categoryController::class, 'change_status_unpublished'])->name('status-change');
Route::get('/change-status-published/{id}', [categoryController::class, 'change_status_published'])->name('status-change-published');
Route::get('/category/edit/{id}', [categoryController::class, 'Category_edit'])->middleware(['auth'])->name('category-edit');
Route::post('/category/update', [categoryController::class, 'Category_update'])->middleware(['auth'])->name('update-category');
Route::get('/category/delete/{id}', [categoryController::class, 'Category_delete'])->middleware(['auth'])->name('category-delete');

//Brand controller
Route::get('/brand/add', [brandController::class, 'index_brand'])->middleware(['auth'])->name('add-brand');
Route::post('/brand/add', [brandController::class, 'add_brand'])->middleware(['auth'])->name('add-brand');
Route::get('/brand/all', [brandController::class, 'manage_brand'])->middleware(['auth'])->name('manage-brand');
Route::get('/brand/unpublished/{id}', [brandController::class, 'change_brand_status_to_unpublished'])->middleware(['auth'])->name('change_brand_status_to_unpublished');
Route::get('/brand/published/{id}', [brandController::class, 'change_brand_status_to_published'])->middleware(['auth'])->name('change_brand_status_to_published');
Route::get('/brand/edit/{id}', [brandController::class, 'brand_edit'])->middleware(['auth'])->name('brand.edit');
Route::post('/brand/edit', [brandController::class, 'brand_update'])->middleware(['auth'])->name('brand.update');
Route::get('/brand/delete/{id}', [brandController::class, 'brand_delete'])->middleware(['auth'])->name('brand.delete');

//product
Route::get('/product/add', [productController::class, 'show_product_add_form'])->middleware(['auth'])->name('add-product');
Route::post('/product/add', [productController::class, 'product_store_form'])->middleware(['auth'])->name('add-product');



