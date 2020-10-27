<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use \Session;
class UsuarioController extends Controller
{


    public function registro(Request $request){

        /*$file = $request->file('file');
   
         //obtenemos el nombre del archivo
         $nombre = $file->getClientOriginalName();
   
         //indicamos que queremos guardar un nuevo archivo en el disco local
         \Storage::disk('local')->put($nombre,  \File::get($file));*/
  
  
          $usuarios= new Usuario;

          $usuarios['cedula'] =$request['cedula'];
          $usuarios['primerNombre'] =$request['primerNombre'];
          $usuarios['segundoNombre'] =$request['segundoNombre'];
          $usuarios['primerApellido'] =$request['primerApellido'];
          $usuarios['segundoApellido'] =$request['segundoApellido'];
          $usuarios['edad'] =$request['edad'];
          $usuarios['email'] =$request['email'];
          $usuarios['direccion'] =$request['direccion'];
          $usuarios['telefono'] =$request['telefono'];
          $usuarios['password'] =$request['contraseña'];
       // $usuarios['imagen']=$nombre;
          $usuarios->save();
           
           return view('Admin/registerEmployees');
          
  
      }
}
