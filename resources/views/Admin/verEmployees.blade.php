@extends('Admin/masterAdmin')

@section('title', 'Ver Usuario')

@section('content')

@foreach ($usuarios as $usuario)


<img src="{{$usuario->foto}}" width="100">



{{$usuario->cedula}}
{{$usuario->nombre1}}
{{$usuario->nombre2}}
{{$usuario->apellido1}}
{{$usuario->apellido2}}
{{$usuario->email}}
{{$usuario->telefono}}
{{$usuario->direccion}}
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Ver Información
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{$usuario->email}}
          {{$usuario->telefono}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@if ($usuario->estado==1)
    <button type="submit" class="btn btn-success" value="{{$usuario->id_usuarios}}">Activo</button>
@endif
@if ($usuario->estado==2)
    <button type="submit" class="btn btn-danger" value="{{$usuario->id_usuarios}}">Bloqueado</button>
@endif
<br>

@endforeach
@endsection