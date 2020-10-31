<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title')</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">



</head>

<body>
    @if (Session::has('usuario'))
        @foreach (Session::get('usuario') as $array)

            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <a class="navbar-brand" href="#">Vista Empleado</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
                    aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor02">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/indexEmployee">Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">Ver Nomina</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">Ver Pagos</a>
                        </li>
                        
                    </ul>

                    <img class="rounded-circle" src="{{$array['foto']}}" width="30">
                    {{ $array['nombre'] }}
                    {{ $array['apellido'] }}
                    {{ $array['email'] }}
                    <form method="POST" action="/cerrarSesion">
                        @csrf
                        <button type="submit" class="btn btn-outline-light">Cerrar Sesion</button>
                    </form>
                </div>
            </nav>



    
    <div class="container">
        @yield('content')
    </div>
    @endforeach
    @endif
</body>

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>

</html>
