@extends('template.main')
@section('tittle'){{'title'}}@endsection
@section('content')
<body>
	<!-- Page Content -->
	<div class="container">
    	<div class="row">
    	@include('template.partials.menu')
    		<main>
                @if(\Session::has('alert'))
                    <div class="col-md-12">
                        <div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
                            <strong>{{Session::get('alert')}}</strong>
                        </div>
                    </div>
                @endif
    			@include('template.partials.menu-left')
    			<div class="col-md-9">
                    <img class="img-responsive" src="{{asset('/img/ofimedia.png')}}" alt="imagen principal" style="padding-bottom: 2.5em;">
                        <!--<div class="row carousel-holder">
                            <div class="col-md-12">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                        </div>
                                        <div class="item">
                                            <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                        </div>
                                        <div class="item">
                                            <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                        </div>
                                    </div>
                                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                    </a>
                                </div>
                            </div>
                        </div>-->
                        <hr>
                        <div class="row">
                        @foreach($products as $p)
                            <div class="col-md-3 col-sm-6 hero-feature">
                                <div class="thumbnail" style="height: 100%;">
                                    <img style="height: 25vh;" src="{{asset('img/products/' . $p->id . '.jpg') }}" alt="">
                                    <div class="caption">
                                    @if(Auth::check())
                                        <h4 class="pull-center">$&nbsp{{$p->price}}</h4>
                                    @else
                                        <p class="pull-center">$&nbspDebe estar registrado</p>
                                    @endif
                                        <p style="font-weight: bold; font-size: 100%;" align="justify">{{str_limit($p->name, $limit = 47, $end = '...')}}</p>
                                        <p>SKU:&nbsp{{$p->sku}}</p>
                                        <p>
                                            <a href="{{route('articulo', [$p->id])}}" class="btn btn-primary">Ver producto</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    <?php echo $products->render() ?>
                </div>
    		</main>
    	</div>
    	<!--Footer Content-->
    	@include('template.partials.footer')
    </div>
</body>
@stop
