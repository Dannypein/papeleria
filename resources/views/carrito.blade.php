@extends('template.main')
@section('tittle'){{'title'}}@endsection
@section('content')
<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        @include('app')
            <main>
              @if ($message = session('success'))
                <div class="alert alert-success">
                  <b>{{ $message }}</b>
                </div>
              @endif

                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #607d8b; color: white;">
                        <a href="{{ url('/desktop') }}"><button class="btn" style="float: left;">Regresar</button></a>
                        <b style="color: white; font-size: 1.5em;">Mi carrito de compra</b>
                        <form style="float: right" method="post" action="{!! route('cart.destroy') !!}">
                          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                          <input type="hidden" name="_method" value="delete">
                          <button type="submit" class="btn btn-danger">Vaciar carrito</button>
                        </form>
                    </div>
                    <div class="panel-body table-responsive">
                        <table style="font-weight: bold" class="table table-condensed table-responsive table-in-cart">
                            <thead style="background-color: #455a64; color: white" >
                              <tr>
                                <th>Artículo</th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Precio unitario</th>
                                <th>Subtotal</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($products as $p)
                                  <tr align="left">
                                    <td><img class="img-in-cart" src="{!! asset('img/products/' . $p['id'] . '.jpg') !!}"></td>
                                    <td>{{$p['nombre']}}</td>
                                    <td>{{$p['cantidad']}}</td>
                                    <td>$ {{$p['precio_unitario']}} MXN</td>
                                    <td>$ {{number_format($p['subtotal'], 2)}} MXN</td>
                                    <td>
                                      <a href="{!! route('cart.delete') !!}"><button type="button" class="btn btn-danger" title="Eliminar"><i class="fa fa-times-circle" aria-hidden="true"></i></button></a>
                                    </td>
                                  </tr>
                              @endforeach
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total:  {{number_format($p['subtotal'], 2)}} MXN</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                  <form style="float: right" method="post" action="{!! route('pedido.create') !!}">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    <button type="submit" class="btn btn-success">Realizar Pedido</button>
                                  </form>
                                </td>
                              </tr>
                            </tbody>
                        </table>
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
