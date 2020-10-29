@extends('Admin/masterAdmin')

@section('title', 'Variables')

@section('content')

Registre Nuevos Contratos o cambie el salario Minimo

<form method="POST" action="/formularioContrato">
    @csrf
    <div class="form-group col-md-6">
        <label for="nombre">Nombre del Contrato</label>
        <input type="text" name="nombre" class="form-control" id="" placeholder="Digite el Nombre">
    </div>
    <div class="form-group col-md-6">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="exampleTextarea" name="descripcion" rows="3"  placeholder="Digite una Descripcion"></textarea>
    </div>
</form>
@endsection