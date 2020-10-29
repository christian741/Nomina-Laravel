<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrato;
class ContratoController extends Controller
{
    public function registroContrato(Request $request)
    {
        
        $contrato = new Contrato;
        
        $contrato['nombre'] = $request['descripcion'];
        $contrato['descripcion'] = $request['descripcion'];
        $contrato['estado'] = 1;

        $contrato->save();

        return view('Admin/registerContrato');
    }
}
