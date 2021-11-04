<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, "index"])->middleware(['auth']);

Route::get('/dashboard', [DashboardController::class, "index"])->middleware(['auth'])->name('dashboard');

Route::get('/add', [MoviesController::class, "getAdd"])->middleware(['auth']);
Route::post('/add', [MoviesController::class, "store"])->middleware(['auth']);
Route::get('/movies/{movie}/edit', [MoviesController::class, "edit"])->middleware(['auth']);
Route::put('/movies/{movie}', [MoviesController::class, "update"])->middleware(['auth']);
Route::delete('/movies/{movie}', [MoviesController::class, "destroy"])->middleware(['auth']);
Route::get('/movies/{movie}/details', [MoviesController::class, "details"]);


require __DIR__.'/auth.php';
