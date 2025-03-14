<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AccessoryController;
use App\Http\Controllers\CredentialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeviceAccessoryController;

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
    Route::get('/unassigned', [DeviceController::class, 'unassigned'])->name('devices.unassigned');

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

    Route::resource('credentials', CredentialController::class)->names([
        'index'   => 'credentials.index',
        'create'  => 'credentials.create',
        'store'   => 'credentials.store',
        'show'    => 'credentials.show',
        'edit'    => 'credentials.edit',
        'update'  => 'credentials.update',
        'destroy' => 'credentials.destroy',
    ]);
    Route::resource('users', UserController::class)->names([
        'index'   => 'users.index',
        'create'  => 'users.create',
        'store'   => 'users.store',
        'show'    => 'users.show',
        'edit'    => 'users.edit',
        'update'  => 'users.update',
        'destroy' => 'users.destroy',
    ]);
    Route::post('/device/{id}/link-credential', [DeviceController::class, 'linkCredentialToDevice'])->name('device.linkCredential');
    Route::post('/device/{id}/unlink-credential', [DeviceController::class, 'unlinkCredentialFromDevice'])->name('device.unlinkCredential');
    // routes resource for device accessories
    Route::delete('device-accessories/{device_id}/{accessory_id}', [DeviceAccessoryController::class, 'destroy'])->name('device-accessories.destroy');
    Route::resource('device-accessories', DeviceAccessoryController::class)->names([
        'index'   => 'device-accessories.index',
        'create'  => 'device-accessories.create',
        'store'   => 'device-accessories.store',
        'show'    => 'device-accessories.show',
        'edit'    => 'device-accessories.edit',
        'update'  => 'device-accessories.update',
    ]);


});
require __DIR__.'/auth.php';
