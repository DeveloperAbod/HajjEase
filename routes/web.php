<?php

use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PilgrimController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes(['register' => false]);

// deactive login
Route::get('/deactive', function () {
    if (!Auth::check()) {
        return view('errors.deactive');
    } else {
        return redirect("/");
    }
})->name('deactive');


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// roles
Route::controller(RoleController::class)->group(function () {
    Route::get('roles', 'index')->name('roles');
    Route::get('roles/add', 'create')->name('roles.create');
    Route::post('roles/store', 'store')->name('roles.store');
    Route::get('roles/{id}/show', 'show')->name('roles.show');
    Route::get('roles/{id}/edit', 'edit')->name('roles.edit');
    Route::put('roles/{id}/update', 'update')->name('roles.update');
    Route::delete('roles/{id}/delete', 'destroy')->name('roles.delete');
});

// users
Route::controller(UserController::class)->group(function () {
    Route::get('users', 'index')->name('users');
    Route::get('users/create', 'create')->name('users.create');
    Route::post('users/store', 'store')->name('users.store');
    Route::get('users/{id}/show', 'show')->name('users.show');
    Route::get('users/{id}/edit', 'edit')->name('users.edit');
    Route::put('users/{id}/update', 'update')->name('users.update');
    Route::delete('users/{id}/delete', 'destroy')->name('users.delete');
});

//user profile
Route::controller(ProfileController::class)->group(function () {
    Route::get('profile', 'index')->name('user_profile');
    Route::put('changePassword', 'changePassword')->name('change_password');
    Route::put('update_profile', 'update')->name('update_profile');
});


//trips
Route::controller(TripController::class)->group(function () {
    Route::get('trips', 'index')->name('trips');
    Route::get('trips/create', 'create')->name('trips.create');
    Route::post('trips', 'store')->name('trips.store');
    Route::get('trips/{trip}', 'show')->name('trips.show');
    Route::get('trips/{trip}/edit', 'edit')->name('trips.edit');
    Route::put('trips/{trip}', 'update')->name('trips.update');
    Route::delete('trips/{trip}', 'destroy')->name('trips.delete');
});


//pilgrims
Route::controller(PilgrimController::class)->group(function () {
    Route::get('pilgrims', 'index')->name('pilgrims');
    Route::get('pilgrims/create', 'create')->name('pilgrims.create');
    Route::post('pilgrims', 'store')->name('pilgrims.store');
    Route::get('pilgrims/{pilgrim}', 'show')->name('pilgrims.show');
    Route::get('pilgrims/{pilgrim}/edit', 'edit')->name('pilgrims.edit');
    Route::put('pilgrims/{pilgrim}', 'update')->name('pilgrims.update');
    Route::delete('pilgrims/{pilgrim}', 'destroy')->name('pilgrims.delete');
});


// offices
Route::controller(OfficeController::class)->group(function () {
    Route::get('offices', 'index')->name('offices');
    Route::get('offices/create', 'create')->name('offices.create');
    Route::post('offices', 'store')->name('offices.store');
    Route::get('offices/{office}', 'show')->name('offices.show');
    Route::get('offices/{office}/edit', 'edit')->name('offices.edit');
    Route::put('offices/{office}', 'update')->name('offices.update');
    Route::delete('offices/{office}', 'destroy')->name('offices.delete');
});
