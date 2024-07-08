<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BorrowerProfileController;
use App\Http\Controllers\Sarpras\AssetCategoryController;
use App\Http\Controllers\Sarpras\OriginController;
use App\Http\Controllers\Sarpras\AssetController;
use App\Http\Controllers\Sarpras\HomeController;
use App\Http\Controllers\Sarpras\BorrowController;

use App\Http\Controllers\Borrower\userHomeController;
use App\Http\Controllers\Borrower\userBorrowController;







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
    Route::get('{id}/profile', [BorrowerProfileController::class, 'index'])->name('admin.profile.index');
Route::post('{id}/profile/update', [BorrowerProfileController::class, 'update'])->name('admin.profile.index');
Route::post('{id}/profile/changePassword', [BorrowerProfileController::class, 'changePassword'])->name('admin.profile.changePassword');
Route::post('{id}/profile/changeImage', [BorrowerProfileController::class, 'changeImage'])->name('admin.profile.changeImage');
});

require __DIR__.'/auth.php';
require __DIR__.'/sarpras.php';









Route::middleware('auth','role:userLv1|userLv2')->group(function () {

Route::get('/user/home', [userHomeController::class, 'index'])->name('user.home');
Route::get('/user/borrow', [userBorrowController::class, 'index'])->name('user.borrow.index');
Route::get('/user/borrow/{id}/detail', [userBorrowController::class, 'show'])->name('user.borrow.detail');
Route::get('/user/borrow/history', [userBorrowController::class, 'history'])->name('user.borrow.detail');


});





 