@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row">
            <!-- <div class="col-sm-4"></div> -->
            <div class="col-sm-4">
                <h3 class="text-center">Editar Usuario</h3>
                <div class="text-success">
                    @if(Session::has('message'))
                        {{Session::get('message')}}
                    @endif
                </div>
                @include('errors.errors')

                {!! Form::model($usuarios, ['route' => ['user.update', $usuarios->id], 'method' => 'patch']) !!}

                    @include('user.formulario')
                    <div class="form-group">
                        {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
            <!-- <div class="col-sm-4"></div> -->
        </div>
    </div>
@endsection



