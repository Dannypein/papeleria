@extends('template.main')
@section('tittle'){{'title'}}@endsection
@section('content')
<body>
	<!-- Page Content -->
	<div class="container">
    	<div class="row">
    	@include('template.partials.menu')
    		<main>
    			@include('template.partials.menu-left')
                <div class="col-md-9">
                        <div class="col-md-3 col-sm-6 hero-feature">
                            <div class="thumbnail">
                                <img src="http://placehold.it/800x500" alt="">
                                <div class="caption">
                                    <h4 class="pull-right">$64.99</h4>
                                    <br>
                                    <h4><a href="#">Second Product</a>
                                    </h4>
                                    <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <p>
                                        <a href="#" class="btn btn-primary">Agregar!</a> <a href="{{route('articulo')}}" class="btn btn-default">Mas info.</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 hero-feature">
                            <div class="thumbnail">
                                <img src="http://placehold.it/800x500" alt="">
                                <div class="caption">
                                    <h4 class="pull-right">$64.99</h4>
                                    <br>
                                    <h4><a href="#">Second Product</a>
                                    </h4>
                                    <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <p>
                                        <a href="#" class="btn btn-primary">Agregar!</a> <a href="{{route('articulo')}}" class="btn btn-default">Mas info.</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 hero-feature">
                            <div class="thumbnail">
                                <img src="http://placehold.it/800x500" alt="">
                                <div class="caption">
                                    <h4 class="pull-right">$64.99</h4>
                                    <br>
                                    <h4><a href="#">Second Product</a>
                                    </h4>
                                    <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <p>
                                        <a href="#" class="btn btn-primary">Agregar!</a> <a href="{{route('articulo')}}" class="btn btn-default">Mas info.</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 hero-feature">
                            <div class="thumbnail">
                                <img src="http://placehold.it/800x500" alt="">
                                <div class="caption">
                                    <h4 class="pull-right">$64.99</h4>
                                    <br>
                                    <h4><a href="#">Second Product</a>
                                    </h4>
                                    <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    <p>
                                        <a href="" class="btn btn-primary">Agregar!</a> <a href="#" class="btn btn-default">Mas info.</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
    		</main>
    	</div>
    	<!--Footer content-->
    	@include('template.partials.footer')
    </div>
</body>
@stop