<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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

Route::get('/', [TaskController::class, "index"])->name('home');
Route::get('/task', [TaskController::class, "addTask"])->name('addTask');

Route::post('/task', [TaskController::class, "store"])->name('store');
Route::get('/task/search', [TaskController::class, "search"])->name('search');

Route::get('/task/list', [TaskController::class, "showList"])->name('showList');

Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('delete');
