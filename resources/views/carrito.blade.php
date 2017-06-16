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
                        <table style="font-weight: bold;" class="table table-condensed table-responsive">
                            <thead style="background-color: #455a64; color: white" >
                              <tr>
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
                                    <td>{{$p['nombre']}}</td>
                                    <td>{{$p['cantidad']}}</td>
                                    <td>$ {{$p['precio_unitario']}} MXN</td>
                                    <td>$ {{number_format($p['subtotal'], 2)}} MXN</td>
                                    <td></td>
                                  </tr>
                              @endforeach
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
