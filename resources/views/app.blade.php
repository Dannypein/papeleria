<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="">Papeleria</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					@if (Auth::guest())
						<li><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i>	Pagina</a></li>
					@else
						<li><a href="{{ url('/desktop') }}"><i class="fa fa-tachometer" aria-hidden="true"></i>	Panel de Control</a></li>
						<li><a href="{{ url('/') }}"><i class="fa fa-shopping-basket" aria-hidden="true"></i>	Pagina de Compras</a></li>
					@endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-log-in"></span>	Entrar</a></li>
						<!--<li><a href="{{ url('/auth/register') }}"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>-->
					@else
						<li><a>Bienvenido:&nbsp{{ Auth::user()->name }}</a></li>
						<li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
</body>
