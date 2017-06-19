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
                        <div class="panel panel-default" style="background-color: #eee;">
                            <!-- Default panel contents -->
                            <div class="panel-heading" style="background-color: #607d8b; color: white;">
                                <a href="{{ url('/admin/catalogo') }}"><button class="btn" style="float: left;">Regresar</button></a>
                                <b style="color: white; font-size: 1.5em;">Datos del Producto</b>
                            </div>
                            <div class="panel-body">
                                <!-- List group -->
                                <ul class="list-group">
                                    <li class="list-group-item"><b>Unidad:</b>&nbsp{{$products->unit}}</li>
                                    <li class="list-group-item"><b>Precio:</b>&nbsp{{$products->price}}</li>
                                    <li class="list-group-item"><b>Modelo:</b>&nbsp{{$products->model}}</li>
                                    <li class="list-group-item"><b>Marca:</b>&nbsp{{$products->brand}}</li>
                                    <li class="list-group-item"><b>Tamaño:</b>&nbsp&nbsp{{$products->size}}</li>
                                    <li class="list-group-item"><b>Peso:</b>&nbsp{{$products->weight}}</li>
                                    <li class="list-group-item"><b>Presentación:</b>&nbsp{{$products->type}}</li>
                                    <li class="list-group-item">
                                    <b>Categoria:</b>
                                    @if($products->category === '1')
                                        <!---->Papeleria y Oficina
                                    @elseif($products->category === '3')
                                        <!---->Consumibles Originales
                                    @elseif($products->category === '4')
                                        <!---->Consumibles Genericos
                                    @else($products->category === '2')
                                        <!---->Accesorios de Computo
                                    @endif
                                    </li>
                                    <li class="list-group-item"><b>Presentación:</b>&nbsp{{$products->type}}</li>
                                </ul>
                                <div class="well well-sm">
                                    <p>Imagen Anterior:</p>
                                    <img src="{{asset('img/products/' . $products->id . '.jpg')}}" class="img-responsive" style="width: 90px; height: 90px" alt=" Imagen no encontrada">
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div><p><b>SKU:</b>&nbsp{{$products->sku}}</p></div>

                            @if($products->available==='si')
                                <div class="well well-sm" align="center" style="background-color: #4CAF50; text-transform: uppercase">
                                    <h6>Disponible:&nbspSI</h6>
                                </div>
                            @else
                                <div class="well well-sm" align="center" style="background-color: #F44336; text-transform: uppercase">
                                    <h6>Disponible:&nbspNO</h6>
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class=" panel panel-default" style="background-color: #eee;">
                            <div class="panel-heading" style="background-color: #607d8b; color: white;">
                                <b style="color: white; font-size: 1.5em;">Nuevos Datos</b>
                            </div>
                            <div class="panel-body">
                                <form method="POST" enctype="multipart/form-data" action="/admin/product/edit/{{$products->id}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <fieldset>
                                    <div class="well"><h5>SKU:&nbsp{{$products->sku}}</h5></div>
                                    <div class="col-md-6">
                                        <div class="list-group">
                                                <div class="list-group-item ">
                                                    <input placeholder="Nombre" class="form-control" name="name" type="text" value="{{$products->name}}">
                                                </div>
                                                <div class="list-group-item ">
                                                    <input placeholder="Modelo" class="form-control" name="model" type="text" value="{{$products->model}}">
                                                </div>
                                                <div class="list-group-item ">
                                                    <input placeholder="Marca" class="form-control" name="brand" type="text" value="{{$products->brand}}">
                                                </div>
                                                <div class="list-group-item ">
                                                    <input placeholder="Tamaño" class="form-control" name="size" type="text" value="{{$products->size}}">
                                                </div>
                                                <div class="list-group-item ">
                                                    <input placeholder="Unidad de Medida" class="form-control" name="unit" type="text" value="{{$products->unit}}">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="list-group">
                                            <div class="list-group-item ">
                                                <input placeholder="Precio" class="form-control" name="price" type="number" value="{{$products->price}}">
                                            </div>
                                            <div class="list-group-item ">
                                                <input placeholder="Peso" class="form-control" name="weight" type="text" value="{{$products->weight}}">
                                            </div>
                                            <div class="list-group-item ">
                                                <input placeholder="Presentación" class="form-control" name="type" type="text" value="{{$products->type}}">
                                            </div>
                                            <!--+++++POR AHORA EN BALNCO+++++-->
                                            <!--<div class="list-group-item ">
                                                <input class="form-control" type="number" name="stock" value="" placeholder="Stock">
                                            </div>-->
                                            <div class="list-group-item ">
                                            <label>Categoria del producto</label>
                                                <select class="form-control" name="category">
                                                    <option @if($products->category === '1') selected @endif value="1">Papeleria y Oficina</option>
                                                    <option @if($products->category === '3') selected @endif value="3">Consumibles Originales</option>
                                                    <option @if($products->category === '4') selected @endif value="4">Consumibles Genericos</option>
                                                    <option @if($products->category === '2') selected @endif value="2">Accesorios de Computo</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="list-group">
                                            <div class="list-group-item ">
                                                <label class="control-label">Seleccione imagen .jpg</label>
                                                <input type="file" class="file" name="file">
                                            </div>
                                            <div class="list-group-item ">
                                                <div class="radio">
                                                    <span>Disponible:</span>&nbsp&nbsp&nbsp
                                                    <label><input type="radio" name="available" value="si" @if($products->available == 'si') checked @endif>SI</label>&nbsp&nbsp&nbsp&nbsp
                                                    <label><input type="radio" name="available" value="no" @if($products->available == 'no') checked @endif>NO</label>
                                                </div>
                                            </div>
                                            <div class="list-group-item ">
                                                <div class="form-group">
                                                    <label for="comment">Detalles:</label>
                                                    <textarea class="form-control" rows="3" name="details">{{$products->details}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </fieldset>
                                    <input type="submit" value="Guardar" class="btn btn-success">
                                </form>
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
