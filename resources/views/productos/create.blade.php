@extends('layouts.home')

@section('content')

    <div class="container">
        <div class="row">
            <!-- <div class="col-sm-4"></div> -->
            <div class="col-sm-4">
                <h3 class="text-center">Agregar Producto</h3>
                <div class="text-success">
                    @if(Session::has('message'))
                        {{Session::get('message')}}
                    @endif
                </div>
                @include('errors.errors')

                {!! Form::open(['route' =>'productos.store', 'method' => 'POST']) !!}

                    @include('productos.formulario')
                    <div class="form-group">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
            
        </div>
    </div>
</div>
@endsection