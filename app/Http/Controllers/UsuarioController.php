<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use \Session;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{

    /**
     * [registroUsuario description]
     *
     * @param   Request  $request  [$request description]
     *
     * @return  [type]             [return description]
     */
    public function registroUsuario(Request $request)
    {
        
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
        $usuarios['estado'] = 1;
        
        $file = $request->file('file');
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('local')->put($nombre,  \File::get($file));
        echo('saddasdsa'+$nombre);
        
        $usuarios['foto'] = $nombre;
        $usuarios->save();

        return view('Admin/registerEmployees');
    }
    /**
     * [verificarUsuario description]
     *
     * @param   Request  $request  [$request description]
     *
     * @return  [type]             [return description]
     */
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
                        'foto' => $valor['foto'],
                        'nombre' => $valor['nombre1'],
                        'apellido' => $valor['apellido1'],
                        'email' => $valor['email'],

                    );
                   
                    Session::put('usuario', $dato);
                } else {
                    $dato1[] = array(
                        'foto' => $valor['foto'],
                        'nombre' => $valor['nombre1'],
                        'apellido' => $valor['apellido1'],
                        'email' => $valor['email'],

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
        return view('/Main/index');
    }

    public function irRegistro(Request $request){
        $contratos = DB::table('contratos')->get();
        return view('Admin/registerEmployees', ['contratos' => $contratos]);
    }
}
