<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/')->group(function(){
    Route::middleware(['auth:web'])->group(function () {
    Route::view('/', 'admin.pages.main')->name('dashboard');
});
});
// Route::prefix('Admin/')->group(function(){
//     Route::middleware(['auth:web'])->group(function(){
//         Route::view('/','admin.pages.main')->name('dashboard');
//     });
// });

// Route::get('/admin',function () {
//     return view('admin.pages.main');
// })->middleware(['auth', 'verified'])->name('dashboard');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
