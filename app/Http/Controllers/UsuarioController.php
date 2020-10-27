<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use \Session;

class UsuarioController extends Controller
{


    public function registroUsuario(Request $request)
    {

        //$file = $request->file('file');

        //obtenemos el nombre del archivo
        //$nombre = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        //Storage::disk('local')->put($nombre,  \File::get($file));
        $usuarios = new Usuario;

        $usuarios['cedula'] = $request['cedula'];
        $usuarios['primerNombre'] = $request['primerNombre'];
        $usuarios['segundoNombre'] = $request['segundoNombre'];
        $usuarios['primerApellido'] = $request['primerApellido'];
        $usuarios['segundoApellido'] = $request['segundoApellido'];
        $usuarios['fechaNacimiento'] = $request['fechaNacimiento'];
        $usuarios['email'] = $request['email'];
        $usuarios['direccion'] = $request['direccion'];
        $usuarios['telefono'] = $request['telefono'];
        $usuarios['password'] = $request['contraseña'];
        // $usuarios['imagen']=$nombre;
        $usuarios->save();

        return view('Admin/registerEmployees');
    }

    public function verificarUsuario(Request $request)
    {

        Session::forget('usuario');

        $cedula = $request->input('cedula');
        $contraseña = $request->input('password');


        $dataCategoria = usuario::all();
        $array = $dataCategoria->toArray();

        for ($i = 0; $i < sizeof($array); $i++) {
            $valor = $array[$i];

            if ($valor['cedula'] == $cedula && $valor['password'] == $contraseña) {
                if (Session::has('usuario')) {

                    $dato = Session::get('usuario');
                    $dato[] = array(
                        'nombre' => $valor['nombre1'],
                        'apellido' => $valor['apellido1'],
                        'correo' => $valor['email'],

                    );
                    Session::put('usuario', $dato);
                } else {
                    $dato1[] = array(
                        'nombre' => $valor['nombre1'],
                        'apellido' => $valor['apellido1'],
                        'correo' => $valor['email'],

                    );
                    Session::put('usuario', $dato1);
                }

                if (Session::has('usuario')) {
                    return view('/Admin/indexAdmin');
                }
            }
        }
        return view('/Admin/index');
    }

    public function cerrarSesion()
    {
        Session::forget('usuario');
        return view('welcome');
    }
}
