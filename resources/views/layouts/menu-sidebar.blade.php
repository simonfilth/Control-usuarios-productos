
	      
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-user">
                </span> Usuarios</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-plus text-info"></span><a href="{{ url('user/create')}}"> Agregar</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-eye-open text-info"></span><a href="{{ url('user/index')}}"> Mostrar</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-file text-info"></span><a href="{{ url('pdf/usuarios')}}" target="blank"> Reportes</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-tasks">
                </span> Productos</a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-plus text-info"></span><a href="{{ url('productos/create')}}"> Agregar</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-eye-open text-info"></span><a href="{{ url('productos/index')}}"> Mostrar</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-file text-info"></span><a href="{{ url('pdf/productos')}}" target="blank"> Reportes</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
    
