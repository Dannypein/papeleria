<div class="col-md-3">
	<p class="lead list-group-item" style="background-color: #eee"><b>Busqueda Avanzada</b></p>
	<div class="list-group">
	    <a class="list-group-item">
	    	<div class="input-group">
		    	<form class="navbar-form navbar-right" action="/catalogo/buscar">
		    		<input type="text" class="form-control" placeholder="Buscar" name="name">
		        	<div class="input-group-btn">
		        		<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
		        	</div>
		    	</form>
        	</div>
	    </a>
	    <a href="{{route('catalogo.disponible2')}}" class="list-group-item"><b>Disponibles</b></a>
	    <a href="{{route('catalogo.reciente2')}}" class="list-group-item"><b>Recientes</b></a>
	    <a href="{{route('catalogo.modificado2')}}" class="list-group-item"><b>Mayor Precio</b></a>
	    <a href="{{route('catalogo.precio2')}}" class="list-group-item"><b>Menor Precio</b></a>
	</div>
</div>