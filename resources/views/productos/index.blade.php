@extends('layouts.home')
@section('title', 'Mi titulo')
@section('description', 'mi descripcion')
@section('keywords', 'palabras, clave, del, sitio, web')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="pull-left">Productos</h1>
                        <div class="text-success" >
                            @if(Session::has('message'))
                                {{Session::get('message')}}
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="panel-body">
                    {!! Form::open(['route' =>'productos.index', 'method' => 'GET','class'=> 'navbar-form navbar-left pull-right','role'=>'search']) !!}
                    <div class="form-group">
                        {!! Form::text('buscar', null, ['class' => 'form-control', 'placeholder' => 'buscar']) !!}

                        {!! Form::select('select', config('options.productos-search'), null, ['class' => 'form-control'])!!}
                        
                    </div>
                        {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}

                </div>
                    {!! Form::close() !!}      
            </div>
        </div>
        <br>
        <div class="row">
             <div class="col-sm-8"> 
             <!-- <p>Hay { { $ total } } productos en total</p> -->
                <table class="table table-condensed table-striped table-bordered">
                    <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Categoria</th>
                    <th>Acción</th>
                    </thead>
                    <tbody>
                        @foreach($productos as $producto)
                            <tr>
                                <td>{!!$producto->id!!}</td>
                                <td>{!!$producto->nombre!!}</td>
                                <td>{!!$producto->precio!!}$</td>
                                <td>{!!$producto->cantidad!!}</td>
                                @foreach($categorias as $categoria)
                                    @if($categoria->id==$producto->categoria_id)
    							     <td>{!!$categoria->nombre!!}</td>
                                    @endif
                                @endforeach
                                <td>
                                    <a  class="btn btn-success btn-xs" href="{{ url('productos/show', $producto->id)}}" ><i class="glyphicon glyphicon-eye-open"></i></a>
                                    
                                @if(Auth::user()->tipousuarioid==1)
                                     <a class="btn btn-primary btn-xs" href="{{ url('productos/edit', $producto->id)}}"><i class="glyphicon glyphicon-edit"></i></a> 
                            		<a class="btn btn-danger btn-xs" href="{{ route('productos/destroy', $producto->id)}}" onclick="return confirm('¿Está seguro que quiere eliminar este producto?')"><i class="glyphicon glyphicon-remove"></i></a>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- onclick="saveid()" -->
                {!!$productos->appends(Request::all())->render()!!}
           </div>
        </div>
    </div>
@endsection

