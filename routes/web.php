<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin/')->middleware('auth:web')->group(function () {
    Route::view('/', 'admin.pages.main')->name('dashboard');

    //ROLE
    Route::resource('role', RoleController::class);
    route::get('role/activer/{role}', [RoleController::class, 'activer'])->name('role.activer');
    //ROLE

    //PROJET
    Route::resource('projet', ProjetController::class);
    route::get('projet/activer/{projet}', [ProjetController::class, 'activer'])->name('projet.activer');
    //PROJET
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
