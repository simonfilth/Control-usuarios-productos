@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-8">
            <h3 >Vista de {!!$usuarios->name!!} </h3>
            <div class="text-success">
                @if(Session::has('message'))
                    {{Session::get('message')}}
                @endif
            </div>
                <br>
                <div><strong>Nombre:</strong> {!!$usuarios->name!!}</div><br>
                <div><strong>Email:</strong> {!!$usuarios->email!!}</div><br>
                <div><strong>Teléfono:</strong> {!!$usuarios->telefono!!}</div><br>
                <div><strong>Dirección:</strong> {!!$usuarios->address!!}</div><br>
                <div><strong>Usuario:</strong> {!!$usuarios->username!!}</div><br>
                @foreach($tipousuarios as $tipousuario)
                    @if($tipousuario->id==$usuarios->tipousuarioid)
                        <div><strong>Tipo de Usuario:</strong> {!!$tipousuario->name!!}</div><br>
                    @endif
                @endforeach
                
            	<br>

                <label> {!!link_to('user', 'Volver atrás')!!} </label>


        </div>
        <!-- <div class="col-sm-4"></div> -->
    </div>
</div>
    <!-- Modal -->

@endsection