@extends('Admin/masterAdmin')

@section('title', 'Registro Admin')

@section('content')

Registro Usuarios desde Administrador
{!! Form::open(['url' => 'formularioUsuarios' , 'file'=>'true'] ) !!}
{{ csrf_field() }}
    <div class="form-row">
      <div class="form-group col-md-6">
          <label for="cedula">Cedula</label>
          <input type="text" name="cedula" class="form-control" id="" placeholder="Primer Nombre" >
          </div>
          <div class="form-group col-md-6">
          <label for="apellido">Segundo Nombre</label>
          <input type="text" name="segundoNombre" class="form-control" id="" placeholder="Segundo Nombre">
          </div>
        
       <div class="form-group col-md-6">
       <label for="nombre">Primer Nombre</label>
       <input type="text" name="primerNombre" class="form-control" id="" placeholder="Primer Nombre" >
       </div>
       <div class="form-group col-md-6">
             <label for="apellido">Segundo Nombre</label>
             <input type="text" name="segundoNombre" class="form-control" id="" placeholder="Segundo Nombre">
             </div>
                           
             </div>
             <div class="form-row">
                 <div class="form-group col -md-6">
                 <label for="apellido">Primer Apellido</label>
                 <input type="text" name="primerApellido" class="form-control" id="" placeholder="Primer Apellido" >
                 </div>
                 <div class="form-group col-md-6">
                 <label for="numeroDocumento">Segundo Apellido</label>
                 <input type="text" name="segundoApellido" class="form-control" id="" placeholder="Segundo Apellido" >
                 </div>
                 </div>
                 <div class="form-row">
                 <div class="form-group col-md-6">
                 <label for="ciudad">Edad</label>
                 <input type="number" name="edad" class="form-control" id="" placeholder="Edad" >
                 </div>
                 <div class="form-group col-md-6">
                 <label for="edad">Email</label>
                 <input type="email" name="email" class="form-control" id="" placeholder="Email" >
                 </div>
                </div>
                <div class="form-row">
                 <div class="form-group col-md-6">
                 <label for="ciudad">Direccion</label>
                 <input type="text" name="direccion" class="form-control" id="" placeholder="Direccion" >
                 </div>
                 <div class="form-group col-md-6">
                 <label for="edad">Telefono</label>
                 <input type="text" name="telefono" class="form-control" id="" placeholder="Telefono" >
                 </div>
                </div>
                 <div class="form-row">
                 <div class="form-group col-md-6">
                 <label for="ciudad">Contraseña</label>
                 <input type="password" name="contraseña" class="form-control" id="" placeholder="Contraseña" >
                 </div>
                </div>
                        
                                              
         <div class="modal-footer">
             <button type="submit" class="btn btn-primary">Guardar Cambios</button>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         </div>
                                
     {!! Form::close() !!}
@endsection