@extends('layouts.home')

@section('content')
<div class="col-sm-9 bg-info">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Formulario de registro</h1>
            <div class="text-info text-center">
                @if(Session::has('message'))
                    {{Session::get('message')}}
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <form method="POST" action="{{url('auth/register')}}">
                {!! csrf_field() !!}

                <div class='form-group'>
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                    <div class="text-danger">{{$errors->first('name')}}</div>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
                    <div class="text-danger">{{$errors->first('email')}}</div>
                </div>

                <div class='form-group'>
                    <label for="telefono">Telefono:</label>
                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" />
                    <div class="text-danger">{{$errors->first('telefono')}}</div>
                </div>
                <div class='form-group'>
                    <label for="address">Dirección:</label>
                    <textarea rows="4" name="address" class="form-control" value="{{ old('address') }}"></textarea>
                    <div class="text-danger">{{$errors->first('address')}}</div>
                </div>
        </div>
        <div class="col-sm-6"> 
            <div class='form-group'>
                <label for="username">Usuario:</label>
                <input type="text" name="username" class="form-control" value="{{ old('username') }}" />
                <div class="text-danger">{{$errors->first('username')}}</div>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" />
                <div class="text-danger">{{$errors->first('password')}}</div>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Password:</label>
                <input type="password" class="form-control" name="password_confirmation" />
            </div>
            
        </div>

    </div>
    <div class="row">
    <br>
        <div class="col-sm-12 text-center">
            <div>
                <button type="submit" class="btn btn-primary">Registrarme</button>
            </div>
            </form>
        </div> 
    </div> 
    <br>
</div>
@stop