@extends('template.main')
@section('tittle'){{'title'}}@endsection
@section('content')
<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        @include('app')
            <main>
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="thumbnail">
                            <img id="img-show" class="img-show" src="{{ asset('img/products/' . $products->id . '/' . $products->id . '.jpg') }}" alt="Sin Imagen">
                            <br>
                            @for ($i = 1; $i < 4; $i++)
                                <div class="col-md-4 portfolio-item">
                                    <a>
                                        <img class="product-image" alt="Sin Imagen" src="{!!asset('img/products'). '/' . $products->id . '/' .$i. '.jpg'!!}" alt="">
                                    </a>
                                </div>
                            @endfor
                            <div class="caption">
                                <div class="panel-heading"><b>Detalles:</b></div>
                                <div class="panel-body"><p>{{$products->details}}</p></div>
                            </div>
                            <br>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <!-- Default panel contents -->
                            <div class="panel-heading" style="background-color: #607d8b; color: white;">
                                <a href="{{ url('/desktop/catalogo') }}"><button class="btn" style="float: left;">Regresar</button></a>
                                <b style="color: white; font-size: 1.5em;">{{$products->name}}</b>
                            </div>
                            <div class="panel-body">
                                <div><h5 class="pull-left">Unidad:&nbsp{{$products->unit}}</h5></div>
                                <div>
                                    <h5 class="pull-right">Precio:&nbsp$&nbsp{{$products->price}}</h5>
                                    <input type="hidden" name="articulos[][precio_unitario]" value="{{$products->price}}">
                                </div>
                                <div>
                                    <select class="form-control" id="sel1">
                                        <option>Pieza</option>
                                        <option>Caja</option>
                                    </select>
                                    <input class="form-control input-sm" type="number" name="articulos[][cantidad]" value="" placeholder="Cantidad a Agregar">
                                    <input name="articulos[][id]" type="hidden" value="1">
                                </div>
                            </div>
                            <!-- List group -->
                            <ul class="list-group">
                                <li class="list-group-item"><b>Modelo:</b>&nbsp{{$products->model}}</li>
                                <li class="list-group-item"><b>Marca:</b>&nbsp{{$products->brand}}</li>
                                <li class="list-group-item"><b>Tamaño:</b>&nbsp&nbsp{{$products->size}}</li>
                                <li class="list-group-item"><b>Peso:</b>&nbsp{{$products->weight}}</li>
                                <li class="list-group-item"><b>Presentación:</b>&nbsp1{{$products->type}}</li>
                            </ul>
                            <div class="panel-footer">
                                <div><p><b>SKU:</b>&nbsp{{$products->sku}}</p></div>

                            @if($products->available==='si')
                                <div class="well well-sm" align="center" style="background-color: #4CAF50; text-transform: uppercase">
                                    <h6>Disponible:&nbsp{{$products->available}}</h6>
                                </div>
                                <a href="" class="btn btn-primary" role="button">Agregar |&nbsp<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                            @else
                                <div class="well well-sm" align="center" style="background-color: #F44336; text-transform: uppercase">
                                    <h6>Disponible:&nbsp{{$products->available}}</h6>
                                </div>
                                <a><button type="submit" class="btn btn-primary disabled" title="agregar">Agregar |&nbsp<i class="fa fa-shopping-cart" aria-hidden="true"></i></button></a>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </main>
                <script>
                    $('.product-image').click(cambiarImagenPrincipal);

                    function cambiarImagenPrincipal() {
                        var nuevaImagenUrl = $(this).attr('src');
                        var imagenPrincipalImg = $('#img-show');

                        imagenPrincipalImg.attr('src', nuevaImagenUrl);
                    }
                </script>
        </div>
        <!--Footer content-->
        @include('template.partials.footer')
    </div>
</body>
@stop
