<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SousTacheController;
use App\Http\Controllers\TacheController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'admin/login');

Route::prefix('admin/')->middleware('auth:web')->group(function () {
    Route::view('/', 'admin.pages.main')->name('dashboard');

    //ROLE
    Route::resource('role', RoleController::class);
    route::get('role/activer/{role}', [RoleController::class, 'activer'])->name('role.activer');
    //ROLE

    //PROJET
    Route::resource('projet', ProjetController::class);
    route::get('projet/{projet}/tache/create', [TacheController::class, 'create'])->name('projet.tache.create');
    //PROJET

    //TACHE
    Route::resource('tache', TacheController::class);
    route::get('tache/{tache}/sousTache/create', [SousTacheController::class, 'create'])->name('tache.sousTache.create');
    //TACHE

    //SOUSTACHE
    Route::resource('sousTache', SousTacheController::class);
    //SOUSTACHE
});

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
