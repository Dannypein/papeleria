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
                                <th>Precio</th>
                                <th>Disponibilidad</th>
                                <th>Agregar</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($products as $p)
                                  <tr align="left">
                                    <td><a href="{{route('articulo', [$p->id])}}">{{$p->name}}</a></td>
                                    <td>{{$p->sku}}</td>
                                    <td>{{$p->price}}</td>
                                    @if($p->available == 'si')
                                        <td class="success">SI</td>
                                        <td>
                                            {!! add_to_cart_button($p) !!}
                                        </td>
                                    @else
                                        <td class="danger">NO</td>
                                        <td>
                                            <div class="btn-add-cart-wrapper">
                                                <button class="btn btn-primary btn-add-cart btn-block disabled">
                                                    <i class="fa fa-shopping-cart"></i> Añadir al carrito
                                                </button>
                                            </div>
                                        </td>
                                    @endif
                                  </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                    </div>
                    <?php echo $products->render() ?>
                </div>
            </main>
        </div>
        <!--Footer content-->
        @include('template.partials.footer')
    </div>
</body>
@stop
