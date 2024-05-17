<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Admin\AssetCategoryController;
use App\Http\Controllers\Admin\OriginController;
use App\Http\Controllers\Admin\AssetController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\BorrowController;

use App\Http\Controllers\User\userHomeController;
use App\Http\Controllers\User\userBorrowController;







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
require __DIR__.'/admin.php';

Route::get('{id}/profile', [UserProfileController::class, 'index'])->name('admin.profile.index');
Route::post('{id}/profile/update', [UserProfileController::class, 'update'])->name('admin.profile.index');




Route::middleware('auth','role:userLv1|userLv2')->group(function () {

Route::get('/user/home', [userHomeController::class, 'index'])->name('user.home');
Route::get('/user/borrow', [userBorrowController::class, 'index'])->name('user.borrow.index');
Route::get('/user/borrow/{id}/detail', [userBorrowController::class, 'show'])->name('user.borrow.detail');
Route::get('/user/borrow/history', [userBorrowController::class, 'history'])->name('user.borrow.detail');


});





 