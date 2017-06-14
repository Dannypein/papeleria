<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{route('home')}}">Papelería</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <ul class="nav navbar-nav">
	    	<li><a href="{{route('home')}}"><i class="fa fa-home" aria-hidden="true"></i>	Inicio</a></li>
	        <li><a href="{{route('acercade')}}"><i class="fa fa-info-circle" aria-hidden="true"></i>	Acerca de</a></li>
	        <li><a href="{{route('contacto')}}"><i class="fa fa-user" aria-hidden="true"></i>	Contacto</a></li>
	        <!--<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">One more separated link</a></li>
	          </ul>
	        </li>-->
	    </ul>
    	<form class="navbar-form navbar-right">
      	<div class="input-group" style="margin-right: 1em;">
          <input type="text" class="form-control input-sm" placeholder="Buscar" name="search">
          <div class="input-group-btn">
            <button class="btn btn-default btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
          </div>
        </div>
        @if (Auth::guest())
        @else
          <div class="dropdown navbar-right">
            <button class="btn btn-default dropdown-toggle btn-sm" type="button" data-toggle="dropdown">
              <i class="fa fa-tachometer" aria-hidden="true"></i><a style="text-decoration: none;">&nbsp{{ Auth::user()->name }}</a>
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
              <li><a href="{{ url('/desktop') }}">Panel de Control</a></li>
              <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a></li>
            </ul>
          </div>
        @endif
    	</form>
      	<ul class="nav navbar-nav navbar-right">
          @if (Auth::guest())
            <li><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Entrar</a></li>
            <!--<li><a href="{{ url('/auth/register') }}"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>-->
          @else

            <li><a href="{{ url('carrito') }}"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbspMi Canasta&nbsp<span class="badge">0</span></a></li>
            
          @endif
	       <!--<li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i>	Carrito</a></li>-->
    	</ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>