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
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Catalogo</h4>
                        </div>
                        <div class="panel-body" id="myDIV">
                          <table style="font-weight: bold;" class="table table-striped table-responsive">
                            <thead style="background-color: #455a64; color: white">
                              <tr>
                                <th>Nombre del Producto</th>
                                <th>SKU</th>
                                <th>Precio</th>
                                <th>Modelo</th>
                                <th>Marca</th>
                                <th>Presentación del producto</th>
                                <th>Unidad de Medida</th>
                                <th>Disponibilidad</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($products as $p)
                                  <tr align="left">
                                    <td>{{$p->name}}</td>
                                    <td>{{$p->sku}}</td>
                                    <td>{{$p->price}}</td>
                                    <td>{{$p->model}}</td>
                                    <td>{{$p->brand}}</td>
                                    <td>{{$p->type}}</td>
                                    <td>{{$p->unit}}</td>
                                    <td>{{$p->available}}</td>
                                    <td>
                                        <a href="{{route('update', [$p->id])}}"><button type="button" class="btn btn-primary" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                    </td>
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
