@extends('Main/welcome')

@section('title', 'Login')

@section('content')

{!! Form::open(['url' => 'formularioLogin' , 'file'=>'true'] ) !!}
    {{ csrf_field() }}
    <div class="form-group">
     <label>Enter Email</label>
     <input type="email" name="email" class="form-control" />
    </div>
    <div class="form-group">
     <label>Enter Password</label>
     <input type="password" name="password" class="form-control" />
    </div>
    <div class="form-group">
     <input type="submit" name="login" class="btn btn-primary" value="Login" />
    </div>
   </form>
@endsection

