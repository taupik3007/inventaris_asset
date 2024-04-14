<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AssetCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/coba', function () {
    return view('coba');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/admin/{id}/profile', [AdminProfileController::class, 'index'])->name('admin.profile.index');

//asset kategori
Route::get('/admin/assetCategory', [AssetCategoryController::class, 'index'])->name('admin.category.index');
Route::get('/admin/assetCategory/create', [AssetCategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/assetCategory/create', [AssetCategoryController::class, 'store'])->name('admin.category.post');
Route::get('/admin/assetCategory/{id}/edit', [AssetCategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('/admin/assetCategory/{id}/edit', [AssetCategoryController::class, 'update'])->name('admin.category.update');
Route::get('/admin/assetCategory/{id}/destroy', [AssetCategoryController::class, 'destroy'])->name('admin.category.destroy');
//end asset kategori


//origin 
Route::get('/admin/origin', [OriginController::class, 'index'])->name('admin.profile.index');
Route::get('/admin/origin/create', [OriginController::class, 'create'])->name('admin.profile.index');
Route::get('/admin/origin/create', [OriginController::class, 'store'])->name('admin.profile.store');
Route::get('/admin/origin/{id}/edit', [OriginController::class, 'edit'])->name('admin.profile.edit');
Route::post('/admin/origin/{id}/edit', [OriginController::class, 'update'])->name('admin.profile.update');
Route::get('/admin/origin/{id}/destroy', [OriginController::class, 'destroy'])->name('admin.profile.destroy');



//end origin







 