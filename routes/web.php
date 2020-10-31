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
Route::get('/indexEmployee',function(){
  return view('/Employee/indexEmployee');
});
Route::get('/verPagos',function(){
  return view('/Employee/seePaids');
});
Route::get('/login', function () {
    return view('Main/login');
});
Route::get('/', function () {
    return view('Main/index');
});
Route::get('/registroAdminUsers','UsuarioController@irRegistro' );
Route::get('/verUsuarios','UsuarioController@verEmpleados' );
Route::get('/indexAdmin', function () {
  return view('Admin/indexAdmin');
});
Route::post('formularioLogin','UsuarioController@verificarUsuario');
Route::post('cerrar','UsuarioController@cerrarSesion');
Route::post('formularioUsuarios','UsuarioController@registroUsuario');
Route::post('cerrarSesion','UsuarioController@cerrarSesion');
Route::post('cerrar','UsuarioController@cerrarSesion');
/**
 * [$archivo description]
 *
 * @param   [File]  $archivo  [$archivo que se encarga de enviar a la ruta la imagen y la guarda]
 *
 * @return  [Response]            [return description]
 */
Route::get('Storage/{archivo}', function ($archivo) {

     $public_path = public_path();
     $url = $public_path.'/imagenes/'.$archivo;
     //verificamos si el archivo existe y lo retornamos
     if (Storage::exists($archivo))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);
});