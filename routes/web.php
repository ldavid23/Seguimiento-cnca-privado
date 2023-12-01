<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AprendizController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('aprendiz/index', [App\Http\Controllers\AprendizController::class, 'index'])->name('aprendiz.read');
// Route::post('aprendiz/registro', [App\Http\Controllers\AprendizController::class, 'store'])->name('aprendiz.create');
Route::resource('Aprendiz', AprendizController::class);
