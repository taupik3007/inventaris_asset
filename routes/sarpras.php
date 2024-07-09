<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Sarpras\AdminProfileController;
use App\Http\Controllers\Sarpras\AssetCategoryController;
use App\Http\Controllers\Sarpras\OriginController;
use App\Http\Controllers\Sarpras\AssetController;
use App\Http\Controllers\Sarpras\HomeController;
use App\Http\Controllers\Sarpras\BorrowController;
use App\Http\Controllers\Sarpras\ManageUserController;
use App\Http\Controllers\Sarpras\PrintController;
use App\Http\Controllers\Sarpras\MajorController;


use App\Http\Controllers\Peminjam\userHomeController;
use App\Http\Controllers\Peminjam\userBorrowController;


Route::middleware('auth','role:sarpras')->group(function () {
    
    //asset kategori
    Route::get('/sarpras/assetCategory', [AssetCategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/sarpras/assetCategory/create', [AssetCategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/sarpras/assetCategory/create', [AssetCategoryController::class, 'store'])->name('admin.category.post');
    Route::get('/sarpras/assetCategory/{id}/edit', [AssetCategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/sarpras/assetCategory/{id}/edit', [AssetCategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/sarpras/assetCategory/{id}/destroy', [AssetCategoryController::class, 'destroy'])->name('admin.category.destroy');
    //end asset kategori
    
    
    //origin 
    Route::get('/sarpras/origin', [OriginController::class, 'index'])->name('admin.origin.index');
    Route::get('/sarpras/origin/create', [OriginController::class, 'create'])->name('admin.origin.create');
    Route::post('/sarpras/origin/create', [OriginController::class, 'store'])->name('admin.origin.store');
    Route::get('/sarpras/origin/{id}/edit', [OriginController::class, 'edit'])->name('admin.origin.edit');
    Route::post('/sarpras/origin/{id}/edit', [OriginController::class, 'update'])->name('admin.origin.update');
    Route::get('/sarpras/origin/{id}/destroy', [OriginController::class, 'destroy'])->name('admin.origin.destroy');
    
    
    
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
    Route::get('/sarpras/home', [HomeController::class, 'home'])->name('sarpras.home');
    
    //endhome
    
    //user
    Route::get('/sarpras/user', [ManageUserController::class, 'index'])->name('admin.user.index');
    Route::get('/sarpras/user/{role}/create', [ManageUserController::class, 'create'])->name('admin.user.create');
    Route::post('/sarpras/user/{role}/create', [ManageUserController::class, 'store'])->name('admin.user.store');
    Route::get('/sarpras/user/{id}/detail', [ManageUserController::class, 'show'])->name('admin.user.show');
    Route::get('/sarpras/user/{id}/edit', [ManageUserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/sarpras/user/{id}/edit', [ManageUserController::class, 'update'])->name('admin.user.update');
    Route::get('/sarpras/user/{id}/destroy', [ManageUserController::class, 'destroy'])->name('admin.user.destroy');
    Route::get('/sarpras/user/{id}/resetPassword', [ManageUserController::class, 'resetPassword'])->name('admin.user.resetPassword');
    Route::post('/sarpras/user/{id}/resetPassword', [ManageUserController::class, 'storeResetPassword'])->name('admin.user.resetPassword');
    Route::get('/sarpras/user/{id}/activate', [ManageUserController::class, 'activate'])->name('admin.user.activate');



    
    
    //end user
    
    //Borrow
    Route::get('/admin/borrow', [BorrowController::class, 'index'])->name('admin.borrow.index');
    Route::get('/admin/borrow/create', [BorrowController::class, 'create'])->name('admin.borrow.create');
    Route::post('/admin/borrow/create', [BorrowController::class, 'store'])->name('admin.borrow.store');
    Route::get('/admin/borrow/{id}/detail', [BorrowController::class, 'show'])->name('admin.borrow.show');
    Route::get('/admin/borrow/{id}/add', [BorrowController::class, 'add'])->name('admin.borrow.add');
    Route::post('/admin/borrow/{id}/add', [BorrowController::class, 'addStore'])->name('admin.borrow.addStore');
    Route::get('/admin/borrow/{id}/edit', [BorrowController::class, 'edit'])->name('admin.borrow.edit');
    Route::post('/admin/borrow/{id}/edit', [BorrowController::class, 'update'])->name('admin.borrow.update');
    Route::get('/admin/borrow/{id}/return', [BorrowController::class, 'return'])->name('admin.borrow.return');
    Route::get('/admin/borrow/detail/{id}/return/{status}', [BorrowController::class, 'returnAsset'])->name('admin.borrow.detail.return');
    Route::get('/admin/borrow/return', [BorrowController::class, 'return'])->name('admin.borrow.return');
    Route::get('/admin/borrow/history', [BorrowController::class, 'history'])->name('admin.borrow.history');



    Route::get('/admin/print/asset/all', [PrintController::class, 'assetAll'])->name('admin.print.asset.all');
    Route::get('/admin/print/asset/good', [PrintController::class, 'assetGood'])->name('admin.print.asset.good');
    Route::get('/admin/print/asset/broken', [PrintController::class, 'assetBroken'])->name('admin.print.asset.broken');
    Route::get('/admin/print/asset/lost', [PrintController::class, 'assetLost'])->name('admin.print.asset.lost');
    Route::get('/admin/print/history', [PrintController::class, 'history'])->name('admin.print.asset.hisory');

    Route::get('/sarpras/major', [MajorController::class, 'index'])->name('sarpras.major.index');
    Route::get('/sarpras/major/create', [MajorController::class, 'create'])->name('sarpras.major.create');
    Route::post('/sarpras/major/create', [MajorController::class, 'store'])->name('sarpras.major.store');
    Route::delete('/sarpras/major/{id}/destroy', [MajorController::class, 'destroy'])->name('sarpras.major.destroy');








    
    
    
    });