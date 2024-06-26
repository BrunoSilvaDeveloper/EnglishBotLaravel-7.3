<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('usuarios', 'App\Http\Controllers\Admin\UsuariosController');
    Route::resource('frases', 'App\Http\Controllers\Admin\FrasesController');
    Route::resource('historias', 'App\Http\Controllers\Admin\HistoriasController');
    Route::resource('aprender', 'App\Http\Controllers\Admin\AprenderController');
    
});