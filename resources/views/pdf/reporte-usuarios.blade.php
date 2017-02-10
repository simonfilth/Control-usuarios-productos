<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte de Usuarios</title>
    {!! Html::style('assets/css/pdf.css') !!}
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{url()}}/assets/css/logo.png">
      </div>
      <h1>Reporte de Usuarios</h1>
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
              <!-- <th>Email</th> -->
              <th>Teléfono</th>
              <th>Dirección</th>
              <th>Usuario</th>
              <th>Tipo de Usuario</th>
            </tr>
          </thead>
          <tbody>
            @for ($i=0; $i < count($data); $i++)
            <tr>
              <td>{{ $data[$i]['id'] }}</td>
              <td>{{ $data[$i]['name'] }}</td>
              <!-- <td>{{ $data[$i]['email'] }}</td> -->
              <td>{{ $data[$i]['telefono'] }}</td>
              <td>{{ $data[$i]['address'] }}</td>
              <td>{{ $data[$i]['username'] }} </td>
              <td>{{ $data[$i]['tipousuarioid'] }} </td>
            </tr>
            @endfor
          </tbody>
      </table>
      <!-- <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div> -->
    <footer>
      Reporte de Usuarios
    </footer>
  </body>
</html>
