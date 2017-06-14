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
                    @foreach($products as $p)
                        <div class="col-md-3 col-sm-6 hero-feature">
                            <div class="thumbnail">
                                <img style="height: 25vh;" src="{{asset('img/products/' . $p->id . '/' . '1' . '.jpg') }}" alt="">
                                <div class="caption">
                                    <h4 class="pull-center">$&nbsp{{$p->price}}</h4>
                                    <p style="font-size: 0.95em; font-weight: bold;" align="justify">{{str_limit($p->name, $limit = 25, $end = '...')}}</p>
                                    <p>SKU:&nbsp{{$p->sku}}</p>
                                    <p>
                                        <a href="{{route('articulo', [$p->id])}}" class="btn btn-primary">Ver producto.</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
    		</main>
    	</div>
    	<!--Footer content-->
    	@include('template.partials.footer')
    </div>
</body>
@stop