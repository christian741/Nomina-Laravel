@extends('Admin/masterAdmin')

@section('title', 'Registro Admin')

@section('content')

    <div class="container-fluid">



        <div class="card">
            <div class="card-title">
                Registro Usuarios desde Administrador
            </div>
            <div class="card-img">
                <img src="">
                <input type="file" name="file">
            </div>
            <div class="card-body">
                <form method="POST" action="/formularioUsuarios" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cedula">Cedula</label>
                            <input type="text" name="cedula" class="form-control" id="" placeholder="Digite Cedula">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="edad">Email</label>
                            <input type="email" name="email" class="form-control" id="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombre">Primer Nombre</label>
                            <input type="text" name="primerNombre" class="form-control" id="" placeholder="Primer Nombre">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellido">Segundo Nombre</label>
                            <input type="text" name="segundoNombre" class="form-control" id="" placeholder="Segundo Nombre">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col -md-6">
                            <label for="apellido">Primer Apellido</label>
                            <input type="text" name="primerApellido" class="form-control" id=""
                                placeholder="Primer Apellido">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="numeroDocumento">Segundo Apellido</label>
                            <input type="text" name="segundoApellido" class="form-control" id=""
                                placeholder="Segundo Apellido">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fecha">Fecha de Nacimiento</label>
                            <input type="date" name="fechaNacimiento" class="form-control" id=""
                                placeholder="Fecha de Nacimiento">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ciudad">Direccion</label>
                            <input type="text" name="direccion" class="form-control" id="" placeholder="Direccion">
                        </div>

                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="edad">Telefono</label>
                            <input type="text" name="telefono" class="form-control" id="" placeholder="Telefono">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contrato">Tipo de Contrato</label>

                            <select multiple="" class="form-control" id="contrato" name="contrato">
                                @foreach ($contratos as $contrato)
                                    <option value="{{ $contrato->id_contratos }}"> {{ $contrato->nombre }}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ciudad">Contraseña</label>
                            <input type="password" name="contraseña" class="form-control" id="" placeholder="Contraseña">
                        </div>
                       
                    </div>





                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
            </div>
            </form>
        </div>
    </div>


@endsection
