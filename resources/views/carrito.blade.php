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
                  <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #607d8b; color: white;">
                        <a href="{{ url('/desktop') }}"><button class="btn" style="float: left;">Regresar</button></a>
                        <b style="color: white; font-size: 1.5em;">Mi Canasta</b>
                    </div>
                    <div class="panel-body table-responsive">
                        <table style="font-weight: bold;" class="table table-condensed table-responsive">
                            <thead style="background-color: #455a64; color: white" >
                              <tr>
                                <th>Nombre del Producto</th>
                                <th>Precio</th>
                                <th>Unidad de Medida</th>
                                <th>Cantidad de Productos</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($products as $p)
                                  <tr align="left">
                                    <td>{{$p['id']}}</td>
                                    <td>{{$p['articulos']}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href=""><button type="button" class="btn btn-danger" title="Eliminar"><i class="fa fa-times-circle" aria-hidden="true"></i></button></a>
                                    </td>
                                  </tr>
                              @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Sub Total:</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total:</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a><button type="submit" class="btn btn-primary" title="agregar">Realizar pedido&nbsp<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
        <!--Footer content-->
        @include('template.partials.footer')
    </div>
</body>
@stop
