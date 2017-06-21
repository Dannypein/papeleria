@extends('template.main')
@section('tittle'){{'title'}}@endsection
@section('content')
<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        @include('app')
            <main>
                @include('template.partials.menu-left-products-admin')
                @if(\Session::has('alert'))
                <div class="col-md-9">
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
                            <a href="{{ url('/admin') }}"><button class="btn" style="float: left;">Regresar</button></a>
                        </div>
                        <div class="panel-body" id="myDIV">
                          <table style="font-weight: bold;" class="table table-striped table-responsive">
                            <thead style="background-color: #455a64; color: white">
                              <tr>
                                <th>Nombre del Producto</th>
                                <th>SKU</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Medidas</th>
                                <th>Precio</th>
                                <th>Disponibilidad</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($products as $p)
                                  <tr align="left">
                                    <td>{{$p->name}}</td>
                                    <td>{{$p->sku}}</td>
                                    <td>{{$p->model}}</td>
                                    <td>{{$p->brand}}</td>
                                    <td>{{$p->size}}</td>
                                    <td>{{$p->price}}</td>
                                    @if($p->available == 'si')
                                        <td class="success">SI</td>
                                    @else
                                        <td class="danger">NO</td>
                                    @endif
                                    <td>
                                        <a href="{{route('update', [$p->id])}}"><button type="button" class="btn btn-primary" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        <a href="/admin/catalogo/product/delete/{{$p->id}}"><button type="button" class="btn btn-danger" title="Eliminar"><i class="fa fa-times-circle" aria-hidden="true"></i></button></a>
                                    </td>
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
