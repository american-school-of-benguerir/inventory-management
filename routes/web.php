<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TypeController;

Route::get('/', function () {
    return view('components.home');
})->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // this is the profile page routes

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/picture', [ProfileController::class, 'updateProfilePicture'])->name('profile.picture.update');

    Route::resource('types', TypeController::class)->names([
        'index'   => 'types.index',
        'create'  => 'types.create',
        'store'   => 'types.store',
        'show'    => 'types.show',
        'edit'    => 'types.edit',
        'update'  => 'types.update',
        'destroy' => 'types.destroy',
    ]);

});
require __DIR__.'/auth.php';
