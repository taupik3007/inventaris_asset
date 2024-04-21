<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AssetCategoryController;
use App\Http\Controllers\Admin\OriginController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\HomeController;



use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
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

Route::middleware('auth','role:admin')->group(function () {
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
Route::get('/admin/origin', [OriginController::class, 'index'])->name('admin.origin.index');
Route::get('/admin/origin/create', [OriginController::class, 'create'])->name('admin.origin.create');
Route::post('/admin/origin/create', [OriginController::class, 'store'])->name('admin.origin.store');
Route::get('/admin/origin/{id}/edit', [OriginController::class, 'edit'])->name('admin.origin.edit');
Route::post('/admin/origin/{id}/edit', [OriginController::class, 'update'])->name('admin.origin.update');
Route::get('/admin/origin/{id}/destroy', [OriginController::class, 'destroy'])->name('admin.origin.destroy');



//end origin

//asset
Route::get('/admin/asset', [AssetController::class, 'index'])->name('admin.asset.index');
Route::get('/admin/asset/create', [AssetController::class, 'create'])->name('admin.asset.create');
Route::post('/admin/asset/create', [AssetController::class, 'store'])->name('admin.asset.store');
Route::get('/admin/asset/{id}/detail', [AssetController::class, 'show'])->name('admin.asset.show');
Route::get('/admin/asset/{id}/edit', [AssetController::class, 'edit'])->name('admin.asset.edit');
Route::post('/admin/asset/{id}/edit', [AssetController::class, 'update'])->name('admin.asset.update');
Route::get('/admin/asset/{id}/destroy', [AssetController::class, 'destroy'])->name('admin.asset.destroy');


//end origin
//home
Route::get('/admin/home', [HomeController::class, 'home'])->name('admin.home');

//endhome

//user
Route::get('/admin/user', [userController::class, 'index'])->name('admin.user.index');
Route::get('/admin/user/create', [userController::class, 'create'])->name('admin.user.create');
Route::post('/admin/user/create', [userController::class, 'store'])->name('admin.user.store');
Route::get('/admin/user/{id}/detail', [userController::class, 'show'])->name('admin.user.show');
Route::get('/admin/user/{id}/edit', [userController::class, 'edit'])->name('admin.user.edit');
Route::post('/admin/user/{id}/edit', [userController::class, 'update'])->name('admin.user.update');
Route::get('/admin/user/{id}/destroy', [userController::class, 'destroy'])->name('admin.user.destroy');


//end user


});




 