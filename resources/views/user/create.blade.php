@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row">
            <!-- <div class="col-sm-4"></div> -->
            <div class="col-sm-4">
                <h3 class="text-center">Agregar Usuario</h3>
                
                @include('errors.errors')

                {!! Form::open(['route' =>'user.store', 'method' => 'POST']) !!}

                    @include('user.formulario')
                    <div class="form-group">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
            
        </div>
    </div>
</div>
@endsection