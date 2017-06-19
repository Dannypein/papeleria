<div class="col-md-3">
	<p class="lead list-group-item"><b>Busqueda Avanzada</b></p>
	<div class="list-group">
	    <a class="list-group-item">
	    	<div class="input-group">
	        	<form class="navbar-form navbar-right" action="/admin/catalogo/buscar">
		    		<input type="text" class="form-control" placeholder="Buscar" name="name">
		        	<div class="input-group-btn">
		        		<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
		        	</div>
		    	</form>
        	</div>
	    </a>
	    <a href="{{route('catalogo.disponible')}}" class="list-group-item"><b>Disponibles</b></a>
	    <a href="{{route('catalogo.reciente')}}" class="list-group-item"><b>Recientes</b></a>
	    <a href="{{route('catalogo.modificado')}}" class="list-group-item"><b>Ultimas Modificaciones</b></a>
	    <a href="{{route('catalogo.precio')}}" class="list-group-item"><b>Mas baratos</b></a>
	    <a href="" class="list-group-item"></a>
	    <a href="{{route('nuevo_product')}}" class="list-group-item"><b>Nuevo Articulo</b></a>
	</div>
</div>