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
use App\Http\Controllers\Sarpras\ClassesController;



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
    Route::get('/sarpras/borrower', [ManageBorrowerController::class, 'index'])->name('admin.borrower.index');
    Route::get('/sarpras/borrower/{role}/create', [ManageBorrowerController::class, 'create'])->name('admin.borrower.create');
    Route::post('/sarpras/borrower/{role}/create', [ManageBorrowerrController::class, 'store'])->name('admin.borrower.store');
    Route::get('/sarpras/borrower/{id}/detail', [ManageBorrowerController::class, 'show'])->name('admin.borrower.show');
    Route::get('/sarpras/borrower/{id}/edit', [ManageBorrowerController::class, 'edit'])->name('admin.borrower.edit');
    Route::post('/sarpras/borrower/{id}/edit', [ManageBorrowerController::class, 'update'])->name('admin.borrower.update');
    Route::get('/sarpras/borrower/{id}/destroy', [ManageBorrowerController::class, 'destroy'])->name('admin.borrower.destroy');
    Route::get('/sarpras/borrower/{id}/resetPassword', [ManageBorrowerController::class, 'resetPassword'])->name('admin.borrower.resetPassword');
    Route::post('/sarpras/borrower/{id}/resetPassword', [ManageBorrowerController::class, 'storeResetPassword'])->name('admin.borrower.resetPassword');
    Route::get('/sarpras/borrower/{id}/activate', [ManageBorrowerController::class, 'activate'])->name('admin.borrower.activate');



    
    
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
    Route::get('/sarpras/major/{id}/edit', [MajorController::class, 'edit'])->name('sarpras.major.edit');
    Route::post('/sarpras/major/{id}/edit', [MajorController::class, 'update'])->name('sarpras.major.update');
    Route::delete('/sarpras/major/{id}/destroy', [MajorController::class, 'destroy'])->name('sarpras.major.destroy');


    Route::get('/sarpras/classes', [ClassesController::class, 'index'])->name('sarpras.classes.index');
    Route::get('/sarpras/classes/create', [ClassesController::class, 'create'])->name('sarpras.classes.create');
    Route::post('/sarpras/classes/create', [ClassesController::class, 'store'])->name('sarpras.classes.store');
    Route::get('/sarpras/classes/{id}/edit', [ClassesController::class, 'edit'])->name('sarpras.classes.edit');
    Route::post('/sarpras/classes/{id}/edit', [ClassesController::class, 'update'])->name('sarpras.classes.update');
    Route::delete('/sarpras/classes/{id}/destroy', [ClassesController::class, 'destroy'])->name('sarpras.classes.destroy');








    
    
    
    });