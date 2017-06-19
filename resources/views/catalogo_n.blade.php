@extends('template.main')
@section('tittle'){{'title'}}@endsection
@section('content')
<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        @include('app')
            <main>
                @include('template.partials.menu-left-products')
                 @if(\Session::has('alert'))
                <div class="col-md-3">
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
                        <strong>{{Session::get('alert')}}</strong>
                    </div>
                </div>
                @endif
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #607d8b; color: white;">
                            <b style="color: white; font-size: 1.5em;">Catalogo</b>
                            <a href="{{ url('/desktop') }}"><button class="btn" style="float: left;">Regresar</button></a>
                        </div>
                        <div class="panel-body" id="myDIV">
                          <table style="font-weight: bold;" class="table table-condensed table-responsive">
                            <thead style="background-color: #455a64; color: white">
                              <tr>
                                <th>Nombre del Producto</th>
                                <th>SKU</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Medidas</th>
                                <th>Precio</th>
                                <th>Disponibilidad</th>
                                <th>Unidad</th>
                                <th>Cantidad</th>
                                <th>Agregar</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($products as $p)
                                  <tr align="left">
                                    <td><a href="{{route('articulo', [$p->id])}}">{{$p->name}}</a></td>
                                    <td>{{$p->sku}}</td>
                                    <td>{{$p->model}}</td>
                                    <td>{{$p->type}}</td>
                                    <td>{{$p->size}}</td>
                                    <td>{{$p->price}}</td>
                                    @if($p->available == 'no')
                                        <td class="danger">NO</td>
                                        <td>
                                            <select class="form-control" id="sel1">
                                                <option>Pieza</option>
                                                <option>Caja</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="total_products" value="1" min="1" max="500">
                                            <input type="hidden" name="articulos[][precio_unitario]" value="{{$p->price}}">
                                        </td>
                                        <td>
                                            <a><button class="btn btn-primary disabled" title="agregar"><i class="fa fa-cart-plus" aria-hidden="true"></i></button></a>
                                        </td>
                                    @else
                                        <td class="success">SI</td>
                                        <td>
                                            <select class="form-control" id="sel1">
                                                <option>Pieza</option>
                                                <option>Caja</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="articulos[][total_products]" value="1" min="1" max="500">
                                            <input type="hidden" name="articulos[][precio_unitario]" value="{{$p->price}}">
                                        </td>
                                        <td>
                                            <a href="/carrito/nuevo"><button class="btn btn-primary" title="agregar"><i class="fa fa-cart-plus" aria-hidden="true"></i></button></a>
                                        </td>
                                    @endif
                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
                    <div class="row container">
                        <?php echo $products->render() ?>
                    </div>
                </div>
            </main>
        </div>
        <!--Footer content-->
        @include('template.partials.footer')
    </div>
</body>
@stop
