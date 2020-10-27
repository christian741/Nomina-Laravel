@extends('Main/welcome')

@section('title', 'Login')

@section('content')

    <form method="POST" action="/formularioLogin">
        @csrf
        <div class="form-group">
            <label>Cedula:</label>
            <input type="text" name="cedula" class="form-control" />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" />
        </div>
        <div class="form-group">
            <input type="submit" name="login" class="btn btn-primary" value="Login" />
        </div>
    </form>


@endsection
