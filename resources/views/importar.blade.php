@extends('template.main')
@section('tittle'){{'title'}}@endsection
@section('content')
<body>
	<!-- Page Content -->
	<div class="container">
    	<div class="row">
    	@include('template.partials.menu')
    		<main>
					<div class="col-xs-12 text-left" style="background-color: white; padding: 2em; color: black;">
						<h4>Importar artículos</h4>
						<p>Selecciona el archivo de Excel con los artículos a importar:</p>

						@if ($errors->count() > 0)
							<div class="alert alert-danger">
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
