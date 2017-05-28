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
                    <div class="col-md-6">
                        <div class="thumbnail">
                            <img class="img-show" src="{{ asset('img/products/' . $details->id . '/' . $details->id . '.jpg') }}" alt="Sin Imagen">
                            <br>
                            @for ($i = 1; $i < 4; $i++)
                                <div class="col-md-4 portfolio-item">
                                    <a>
                                        <img id="myImg" class="product-image" alt="Sin Imagen" src="{!!asset('img/products'). '/' . $details->id . '/' .$i. '.jpg'!!}" alt="">
                                    </a>
                                </div>
                            @endfor
                            <div class="caption">
                                <div class="panel-heading"><b>Detalles:</b></div>
                                <div class="panel-body"><p>{{$details->details}}</p></div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading"><h5>{{$details->name}}</h5></div>
                            <div class="panel-body">
                                <div><h5 class="pull-left">Unidad:&nbsp{{$details->unit}}</h5></div>
                                <div><h5 class="pull-right">Precio:&nbsp$&nbsp{{$details->price}}</h5></div>
                                <div>
                                    <input class="form-control input-sm" type="number" value="" placeholder="Cantidad a Agregar">
                                </div>
                            </div>
                            <!-- List group -->
                            <ul class="list-group">
                                <li class="list-group-item"><b>Modelo:</b>&nbsp{{$details->model}}</li>
                                <li class="list-group-item"><b>Marca:</b>&nbsp{{$details->brand}}</li>
                                <li class="list-group-item"><b>Tamaño:</b>&nbsp&nbsp{{$details->size}}</li>
                                <li class="list-group-item"><b>Peso:</b>&nbsp{{$details->weight}}</li>
                                <li class="list-group-item"><b>Presentación:</b>&nbsp1{{$details->type}}</li>
                            </ul>
                            <div class="panel-footer">
                                <div><p><b>SKU:</b>&nbsp{{$details->sku}}</p></div> 

                                @if($details->available==='si')
                                    <div class="well well-sm" align="center" style="background-color: #4CAF50; text-transform: uppercase">
                                        <h6>Disponible:&nbsp{{$details->available}}</h6>
                                    </div>
                                    <a href="" class="btn btn-primary" role="button">Agregar |&nbsp<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                @else
                                    <div class="well well-sm" align="center" style="background-color: #F44336; text-transform: uppercase">
                                        <h6>Disponible:&nbsp{{$details->available}}</h6>
                                    </div>
                                    <a href="" class="btn btn-primary disabled" role="button">Agregar |&nbsp<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                @endif
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

<!--
<div class="thumbnail">
                        <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                        <div class="caption">
                            <h5 class="pull-left">Unidad:&nbspPZA</h5>
                            <h4 class="pull-right"><i class="fa fa-usd" aria-hidden="true">&nbsp250</i></h4>
                            <div class="ratings">
                                <a href="" class="btn btn-primary" role="button">Agregar |&nbsp<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                <input class="form-control" type="number" placeholder="Cantidad a Agregar">
                            </div>
                            <br>
                            <div class="panel panel-default">
                                <div class="panel-heading"><h4><a>Nombre del producto</a></h4></div>
                                <div class="panel-body"><h5>Clave:&nbsp12345</h5></div>
                                <div class="panel-body"><h5>Marca:&nbspLiquid Paper</h5></div>
                                <div class="panel-body"><h5>Tamaño:&nbsp&nbsp0CM</h5></div>
                                <div class="panel-body"><h5>Peso:&nbsp200ML</h5></div>
                                <div class="panel-body"><h5>Presentación:&nbsp1Frasco</h5></div>
                                <div class="panel-footer"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
                            </div>
                        </div>
                    </div>
-->
<!--
    <img src="{{ asset('img/products/' . $details->id . '/' . $details->id . '.jpg') }}" alt="Sin Imagen">
                            <br>
                            @for ($i = 1; $i < 4; $i++)
                                <div class="col-md-4 portfolio-item">
                                    <a>
                                        <img id="myImg" class="img-responsive product-image" alt="Sin Imagen" src="{!!asset('img/products'). '/' . $details->id . '/' .$i. '.jpg'!!}" alt="">
                                    </a>
                                </div>
                            @endfor
                            <div class="caption">
                                <div class="panel-heading"><b>Detalles:</b></div>
                                <div class="panel-body"><p>{{$details->details}}</p></div>
                            </div>
-->