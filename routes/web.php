<?php

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

//Main
Route::get('/login', function () {
    return view('Main/login');
});

Route::get('/', function () {
    return view('Main/index');
});
Route::post('formularioLogin','UsuarioController@registro');
Route::post('cerrar','UsuarioController@cerrarSesion');
//Administrador
Route::get('/Admin/registro', function () {
    return view('registerEmployees');
});

Route::get('/Admin/index', function () {
    return view('indexAdmin');
});

Route::get('/Admin/verUsuarios', function () {
    return view('verEmployees');
});

Route::post('formularioUsuarios','UsuarioController@registro');

//Empleado
Route::get('/Admin/registro', function () {
    return view('Admin/registerEmployees');
});

Route::get('/Admin/index', function () {
    return view('Admin/indexAdmin');
});


