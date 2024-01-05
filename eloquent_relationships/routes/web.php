<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubjectController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [UserController::class, 'home'])->name('home');


Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user');
    Route::post('/create', [UserController::class, 'create'])->name('user.create');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/{id}/update', [UserController::class, 'update'])->name('user.update');
});

Route::prefix('address')->group(function () {
    Route::get('/', [AddressController::class, 'index'])->name('address');
    Route::post('/create', [AddressController::class, 'create'])->name('address.create');
    Route::delete('/{id}', [AddressController::class, 'destroy'])->name('address.delete');
    Route::get('/{id}/edit', [AddressController::class, 'edit'])->name('address.edit');
    Route::post('/{id}/update', [AddressController::class, 'update'])->name('address.update');
    Route::post('/assing/{address_id}', [AddressController::class, 'assinguser'])->name('address.assing');
    Route::get('/assingAddres/{id}', [AddressController::class, 'showAssing'])->name('address.showAssing');

});


