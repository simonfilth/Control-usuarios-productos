<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Inventario</title>
        <meta name="description" content="@yield('description')" />
        <meta name="keywords" content="@yield('keywords')" />
        <link rel='stylesheet' type='text/css' href='{{url()}}/assets/css/custom-styles.css' />
        <link rel='stylesheet' type='text/css' href='{{url()}}/bootstrap/css/bootstrap.min.css' />
        <link rel='stylesheet' type='text/css' href='{{url()}}/assets/css/simple-sidebar.css' />      
        <!-- <link rel='stylesheet' type='text/css' href='{{url()}}/assets/css/pdf.css' />       -->
        <!-- { ! ! Html : : style(' assets / css / pdf.css') !!} -->
    </head>
    <body>
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="{{url()}}">Inventario</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  
                  <ul class="nav navbar-nav">
                    <li><a href="{{url('user/index')}}">Usuarios</a></li>
                  </ul>
                  <ul class="nav navbar-nav">
                    <li><a href="{{url('productos/index')}}">Productos</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                    <li><a href="{{url()}}">{{Auth::user()->name}}</a></li>
                    <li><a href="{{url('auth/logout')}}">Salir</a></li>
                    @else
                        <li><a href="{{url('auth/login')}}">Iniciar sesión</a></li>
                        <li><a href="{{url('auth/register')}}">Registrarse</a></li>
                    @endif
                  </ul>
                </div>
            </div>
        </nav>
        <div class="container" >
            <div class="row">
                @if(Auth::check())
                    <div class="col-sm-3 col-md-2 sidebar">     
                        @include('layouts.menu-sidebar')
                    </div>
                @endif
                <div class="col-sm-9 col-sm-offset-2 ">
                    @yield('content')
                </div>
            </div>           
        </div>  
         
        <script type='text/javascript' src='{{url()}}/bootstrap/js/jquery.js'>
        </script>
        <script type='text/javascript' src='{{url()}}/bootstrap/js/bootstrap.min.js'>
        </script>
    </body>
</html>