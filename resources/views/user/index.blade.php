@extends('layouts.home')
@section('title', 'Mi titulo')
@section('description', 'mi descripcion')
@section('keywords', 'palabras, clave, del, sitio, web')
@section('content')
<!-- <?php
//$global="hola";
?>
<script>
var valor;
    function saveid(id){
        valor=id;
        alert("asdasda");
    }
</script>
<?php
        // $global = '<script>document.write(valor)</script>';          
         ?> -->
    <!-- <div class="container"> -->
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="pull-left">Usuarios</h1>
                        <div class="text-success" >
                            @if(Session::has('message'))
                                {{Session::get('message')}}
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="panel-body">

                    {!! Form::open(['route' =>'user.index', 'method' => 'GET','class'=> 'navbar-form navbar-left pull-right','role'=>'search']) !!}
                    <div class="form-group">
                        {!! Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'buscar']) !!}

                        {!! Form::select('select', config('options.user-search'), null, ['class' => 'form-control'])!!}
                        
                    </div>
                        {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}

                </div>
                    {!! Form::close() !!}      
            </div>
        </div>
        <br>
        <div class="row">
             <div class="col-sm-12"> 
             <!-- <p>Hay { { $ total } } usuarios en total</p> -->
                <table class="table table-condensed table-striped table-bordered">
                    <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <!-- <th>Usuario</th> -->
                    <th>Tipo de Usuario</th>
                    <th>Acción</th>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                            @if($usuario->tipousuarioid!=1)
                                <tr>
                                    <td>{!!$usuario->id!!}</td>
                                    <td>{!!$usuario->name!!}</td>
                                    <td>{!!$usuario->email!!}</td>
                                    <td>{!!$usuario->telefono!!}</td>
                                    <!-- <td>{ ! !$usuario->username! ! }</td> -->
                                    @foreach($tipousuarios as $tipousuario)
                                        @if($tipousuario->id==$usuario->tipousuarioid)
        							     <td>{!!$tipousuario->name!!}</td>
                                        @endif
                                    @endforeach
                                    <td>
                                        <a  class="btn btn-success btn-xs" href="{{ url('user/show', $usuario->id)}}" ><i class="glyphicon glyphicon-eye-open"></i></a>
                                        
                                    @if(Auth::user()->tipousuarioid==1)
                                         <a class="btn btn-primary btn-xs" href="{{ url('user/edit', $usuario->id)}}"><i class="glyphicon glyphicon-edit"></i></a> 
                                		<a class="btn btn-danger btn-xs" href="{{ route('user/destroy', $usuario->id)}}" onclick="return confirm('¿Está seguro que quiere eliminar este usuario?')"><i class="glyphicon glyphicon-remove"></i></a>
                                    @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <!-- onclick="saveid()" -->
                {!!$usuarios->appends(Request::all())->render()!!}
           </div>
        </div>
    <!-- </div> -->
<!--  <div class="modal fade"  id="show-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">

            <input type="text" name="valor" id="valor" value="" />

                <div class="container">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-6">
                            <div id="valor"></div>
                        
                                
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->


@endsection

