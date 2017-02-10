@extends('layouts.home')

@section('content')
 
<div class="col-sm-12">
    <div class="col-sm-1"></div>
    <div class="col-sm-5">
        <section id="content">
            <h1 class="text-center border">Iniciar sesión</h1>

            <div class="text-danger">
                @if (Session::has('message'))
                {{Session::get('message')}}
                @endif
            </div>
            <hr />
            <form method="post" action="{{url('auth/login')}}">
                {{csrf_field()}}
                <div class="form-group has-feedback">
                    <!-- <label for="username">Usuario:</label> -->
                    <input type="text" placeholder="Usuario" id="username" name="username" class="form-control" value="{{Input::old('username')}}" />
                    <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
                    <div class="text-danger">{{$errors->first('username')}}</div>
                </div>
                <div class="form-group has-feedback">
                    <!-- <label for="password">Contraseña:</label> -->
                    <input type="password" placeholder="Contraseña" id="password" name="password" class="form-control" />
                    <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
                    <div class="text-danger">{{$errors->first('password')}}</div>
                </div>
                <div class="form-group">
                    <!-- <label for="remember">No cerrar sesión:</label>
                    <input type="checkbox" name="remember" /> -->
                
                  <input type="submit" class="form-group" value="Iniciar Sesión" />
                  <a href="{{url('auth/register')}}">Registrarse</a>
                </div>
                <!-- <button type="submit" class="btn btn-primary ">Iniciar sesión</button> -->
            </form>
            <br /><br /><br /><br />
          
        </section>
        
    </div>
</div>
 
@stop