@extends('layouts.home')

@section('content')

<div class="container vista">
    <div class="row">
        <div class="col-sm-4">
            <h1>{!!$productos->nombre!!} </h1>
            <div class="text-success">
                @if(Session::has('message'))
                    {{Session::get('message')}}
                @endif
            </div>
                <br>
                <div><strong>Código:</strong> {!!$productos->codigo!!}</div><br>
                <div><strong>Nombre:</strong> {!!$productos->nombre!!}</div><br>
                <div><strong>Precio:</strong> {!!$productos->precio!!} $</div><br>
                <div><strong>Cantidad:</strong> {!!$productos->cantidad!!}</div><br>
                <div><strong>Descripción:</strong> {!!$productos->descripcion!!}</div><br>
                <br>
                @foreach($categorias as $categoria)
                    @if($categoria->id==$productos->categoriaid)
                        <div><strong>Categoría:</strong> {!!$categoria->nombre!!}</div><br>
                    @endif
                @endforeach
        </div>
        <div class="col-sm-4">
            <div><img src="{{url()}}/assets/img/{!!$productos->imagen!!}" class="img-responsive"> </div>
                <br>
            <br>
        </div>
     </div>           

                <label> {!!link_to('productos', 'Volver atrás')!!} </label>


    
        
</div>
    <!-- Modal -->

@endsection