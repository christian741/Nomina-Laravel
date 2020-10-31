<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Contrato;
use \Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

        $contratos = new Contrato;

        $contratos['id_contratos']= $request['contrato'];
        
        $file = $request->file('file');
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('local')->put($nombre,  \File::get($file));
        echo('saddasdsa'+$nombre);
        
        $usuarios['foto'] = $nombre;
        $usuarios->save();

        return view('registerEmployees');
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
        $password = $request->input('password');

        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
       

        $usuarios = DB::table('usuarios')->get();
        $out->writeln("Hello from Terminal".\sizeof($usuarios));
        foreach($usuarios as $usuario){
            if($usuario->cedula==$cedula){

                $dato1[] = array(
                    'foto' => $usuario->foto,
                    'nombre' => $usuario->nombre1,
                    'apellido' => $usuario->apellido1,
                    'email' => $usuario->email,
                    'rol'=> $usuario->id_rol,
                );
                $out->writeln("Hello from Terminal". $usuario->email);
                $request->session()->put('usuario', $dato1);    
            }
            $out->writeln("Hello from Terminal". strlen($usuario->cedula));
            $out->writeln("Hello from Terminal". strlen($cedula));
        }
        $valor = $request->session()->get('usuario');
        
        if($valor[0]['rol']==1){
            return view('/Admin/indexAdmin');
        }
        if($valor[0]['rol']==2){
            return view('/Employee/indexEmployee');
        }
        
        //$out->writeln("Hello from Terminal".$valor);

        //\abort(404);
        
         
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
    public function verEmpleados(Request $request){
        $usuarios = DB::table('usuarios')->get();
        return view('Admin/verEmployees', ['usuarios' => $usuarios]);
    }
    
    
}
