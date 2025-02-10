<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AccessoryController;

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
    Route::resource('devices', DeviceController::class)->names([
        'index'   => 'devices.index',
        'create'  => 'devices.create',
        'store'   => 'devices.store',
        'show'    => 'devices.show',
        'edit'    => 'devices.edit',
        'update'  => 'devices.update',
        'destroy' => 'devices.destroy',
    ]);
    Route::apiResource('notes', NoteController::class)->names([
        'index'   => 'notes.index',
        'create'  => 'notes.create',
        'store'   => 'notes.store',
        'show'    => 'notes.show',
        'edit'    => 'notes.edit',
        'update'  => 'notes.update',
        'destroy' => 'notes.destroy',
    ]);
    Route::resource('accessories', AccessoryController::class)->names([
        'index'   => 'accessories.index',
        'create'  => 'accessories.create',
        'store'   => 'accessories.store',
        'show'    => 'accessories.show',
        'edit'    => 'accessories.edit',
        'update'  => 'accessories.update',
        'destroy' => 'accessories.destroy',
    ]);
});
require __DIR__.'/auth.php';
