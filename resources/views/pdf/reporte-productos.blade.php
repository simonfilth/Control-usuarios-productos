
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte de Productos</title>
    {!! Html::style('assets/css/pdf.css') !!}
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{url()}}/assets/css/logo.png">
      </div>
      <h1>Reporte de Productos</h1>
      <div id="company" class="clearfix">
        <div>Compañia</div>
        <div>Simón Company,<br /> Venezuela </div>
        <div>(+58) 412-103-9433</div>
        <div><a href="mailto:developer@simonaguilera.com.ve">developer@simonaguilera.com.ve</a></div>
      </div>
      <div id="project">
        <div><span>PROJECTO</span> Website development</div>
        <div><span>CLIENTE</span> Simón Aguilera</div>
        <div><span>DIRECCIÓN</span> El Tigre, 77, VEN</div>
        <div><span>EMAIL</span> <a href="mailto:developer@simonaguilera.com.ve">developer@simonaguilera.com.ve</a></div>
        <div><span>DATE</span>{{$date}}</div>
      </div>
    </header>
      <table class="table table-condensed table-striped table-bordered">
        <thead>
	        <tr>
		        <th>#</th>
		        <th>Nombre</th>
		        <th>Descripción</th>
		        <th>Precio</th>
		        <th>Cantidad</th>
		        <th>Categoria</th>
	        </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{!!$producto->id!!}</td>
                    <td>{!!$producto->nombre!!}</td>
                    <td>{!!$producto->descripcion!!}</td>
                    <td>{!!$producto->precio!!}$</td>
                    <td>{!!$producto->cantidad!!}</td>
                    @foreach($categorias as $categoria)
                        @if($categoria->id==$producto->categoria_id)
					     <td>{!!$categoria->nombre!!}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
      <!-- <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div> -->
    <footer>
      Reporte de Productos
    </footer>
  </body>
</html>
