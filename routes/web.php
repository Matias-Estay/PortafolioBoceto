<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);
// Obtener Usuario
Route::get('/usuario',[UsuarioController::class, 'obtener_usuario']);
//Ruta falsa para post
Route::post('/test', 'UsuarioController@post_test');
//Ruta falsa para get
Route::get('/test_get', 'UsuarioController@get_test');
Route::post('/cambiar_pass', 'Auth\ResetPasswordController@updatePassword');

Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
