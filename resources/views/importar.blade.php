@extends('template.main')
@section('tittle'){{'title'}}@endsection
@section('content')
<body>
	<!-- Page Content -->
	<div class="container">
    	<div class="row">
    	@include('template.partials.menu')
    		<main>
    		<div class="col-md-12">
    			<div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #607d8b; color: white;">
                        <a href="{{ url('admin') }}"><button class="btn" style="float: left;">Regresar</button></a>
                        <b style="color: white; font-size: 1.5em;">Importar Catálogo de artículos</b>
                    </div>
                    <div class="panel-body">
                    	<div class="col-xs-12 text-left" style="background-color: white; padding: 2em; color: black;">
							<h4>Importar artículos</h4>
							<p>Selecciona el archivo de Excel con los artículos a importar:</p>
							@if ($errors->count() > 0)
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
									@foreach ($errors->all() as $error)
										<p>{{ $error }}</p>
									@endforeach
								</div>
							@endif

							<form class="form" method="post" action="{!! route('products.importar') !!}" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{!! csrf_token() !!}">

								<div class="form-group">
									<div class="input-group">
		                				<label class="input-group-btn">
			                   				<span class="btn btn-default">
			                        			Explorar&hellip; <input name="archivo" type="file" style="display: none">
			                    			</span>
		                				</label>
		               					<input type="text" class="form-control" readonly>
		            				</div>
								</div>

					            <div class="form-group">
					            	<input type="submit" value="Importar" class="btn btn-primary">
					            </div>
							</form>
          				</div>
                	</div>
            	</div>
    		</main>
    	</div>
    	<!--Footer content-->
    	@include('template.partials.footer')
    </div>
		<script>
		  $(':file').on('change', function(e) {
				var nombreArchivo = $(this).val()
				                           .replace(/\\/g, '/')
																	 .replace(/.*\//, '');

				var input = $(this).parents('.input-group').find(':text');
				input.val("  " + nombreArchivo);
			});
		</script>
</body>
@stop
