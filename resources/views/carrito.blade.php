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
                <div class="col-md-12">
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
                        <strong>{{ $message }}</strong>
                    </div>
                </div>
              @endif

                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #607d8b; color: white;">
                        <a href="{{ url('/home') }}"><button class="btn" style="float: left;">Regresar</button></a>
                        <b style="color: white; font-size: 1.5em;"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbspMi canasta de compra</b>
                        <form style="float: right" method="post" action="{!! route('cart.destroy') !!}">
                          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                          <input type="hidden" name="_method" value="delete">
                          <button type="submit" class="btn btn-danger">Vaciar carrito</button>
                        </form>
                    </div>
                    <div class="panel-body table-responsive">
                    @if ($errors->count() > 0)
                      <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
                        @foreach ($errors->all() as $error)
                          <p>{{ $error }}</p>
                        @endforeach
                      </div>
                    @endif
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
                                    <td>
                                      <img class="img-in-cart" src="{!! asset('img/products/' . $p['id'] . '.jpg') !!}">
                                    </td>
                                    <td>{{$p['nombre']}}</td>
                                    <td>{{$p['cantidad']}}</td>
                                    <td>$ {{$p['precio_unitario']}} MXN</td>
                                    <td>$ {{number_format($p['subtotal'], 2)}} MXN</td>
                                    <td>
                                      <form method="post" action="{!! route('cart.remove_product', $p['id']) !!}">
                                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                        <input type="hidden" name="_method" value="delete">
                                        <button class="btn btn-danger" type="submit" title="Remover artículo del carrito">
                                          <i class="fa fa-close"></i>
                                        </button>
                                      </form>
                                    </td>
                                  </tr>
                              @endforeach
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total:  ${{ number_format(collect($products)->sum('subtotal'), 2) }} MXN</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                  <form style="float: right" method="POST" action="{!! route('pedido.create') !!}">
                                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                    @unless ($cart->isEmpty())
                                      <button type="submit" class="btn btn-success">Realizar Pedido</button>
                                    @endunless
                                    
                                    <tr>
                                      <div class="form-group">
                                        <label for="comment">Detalles del pedido:</label>
                                        <textarea class="form-control" rows="1" name="details" placeholder="Agregue un Comentario"></textarea>
                                      </div>
                                    </tr>
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
