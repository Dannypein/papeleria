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
                    <div class="panel panel-default" style="background-color: #eee;">
                        <div class="panel-heading" style="background-color: #607d8b; color: white;">
                            <a href="{{ url('/admin/catalogo') }}"><button class="btn" style="float: left;">Regresar</button></a>
                            <b style="color: white; font-size: 1.5em;">Nuevo Producto</b>
                        </div>
                        <div class="panel-body">
                            <form method="POST" enctype="multipart/form-data" action="/admin/catalogo/producto/nuevo">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                <div class="panel" style="background-color: #616161; color: white; box-shadow: 7px 7px 7px #888888;">
                                    <div class="panel-heading">Recomendaciones de llenado</div>
                                    <div class="panel-body" style="background-color: #9e9e9e; color: white;">
                                        <ul align="left">
                                            <li><b>Nombre:</b> Nombre del articulo</li>        
                                            <li><b>Modelo:</b> Numero de Modelo del Código</li>
                                            <li><b>Peso:</b> Gr(Gramo), Ltr(Litro), ML(Mililitro), KG(Kilogramo)</li>
                                            <li><b>Tamaño:</b> Tamaño del producto, Ejem(10cm X 10cm x5cm)</li>
                                            <li><b>Presentacion:</b> Paquete(PAQ), Caja(CAJ), Pieza(PZA)</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="list-group">
                                            <div class="list-group-item ">
                                                <input placeholder="Nombre" class="form-control" name="name" type="text" value="">
                                            </div>
                                            <div class="list-group-item ">
                                                <input placeholder="SKU" class="form-control" name="sku" type="text" value="">
                                            </div>
                                            <div class="list-group-item ">
                                                <input placeholder="Modelo" class="form-control" name="model" type="text" value="">
                                            </div>
                                            <div class="list-group-item ">
                                                <input placeholder="Marca" class="form-control" name="brand" type="text" value="">
                                            </div>
                                            <div class="list-group-item ">
                                                <input placeholder="Tamaño" class="form-control" name="size" type="text" value="">
                                            </div>
                                            <div class="list-group-item ">
                                                <input placeholder="Unidad de Medida" class="form-control" name="unit" type="text" value="">
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="list-group">
                                        <div class="list-group-item ">
                                            <input placeholder="Precio" class="form-control" name="price" type="number" step="any" value="">
                                        </div>
                                        <div class="list-group-item ">
                                            <input placeholder="Peso" class="form-control" name="weight" type="text" value="">
                                        </div>
                                        <div class="list-group-item ">
                                            <input placeholder="Presentación" class="form-control" name="type" type="text" value="">
                                        </div>
                                        <!--+++++POR AHORA EN BALNCO+++++-->
                                        <!--<div class="list-group-item ">
                                            <input class="form-control" type="number" name="stock" value="" placeholder="Stock">
                                        </div>-->
                                        <div class="list-group-item">
                                        <label>Categoria del producto</label>
                                            <select class="form-control" name="category">
                                                <option value="1">Papeleria y Oficina</option>
                                                <option value="2">Consumibles Originales</option>
                                                <option value="3">Consumibles Genericos</option>
                                                <option value="4">Accesorios de Computo</option>
                                            </select>
                                        </div>
                                        <div class="list-group-item ">
                                            <label class="control-label">Seleccione imagen .jpg</label>
                                            <input type="file" class="file" name="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="list-group">
                                        <div class="list-group-item ">
                                            <div class="radio">
                                                <span>Disponible:</span>&nbsp&nbsp&nbsp
                                                <label>
                                                <input type="radio" name="available" value="si">SI</label>&nbsp&nbsp&nbsp&nbsp
                                                <label>
                                                <input type="radio" name="available" value="no">NO</label>
                                            </div>
                                        </div>
                                        <div class="list-group-item ">
                                            <div class="form-group">
                                                <label for="comment">Detalles:</label>
                                                <textarea class="form-control" rows="3" name="details"></textarea>
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
            </main>
        </div>
        <!--Footer content-->
        @include('template.partials.footer')
    </div>
</body>
@stop
