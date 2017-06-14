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
                            <a href="{{ url('/admin/pedidos') }}"><button class="btn" style="float: left;">Regresar</button></a>
                            <b style="color: white; font-size: 1.5em;">Datos del Pedido</b>
                        </div>
                        <div class="panel-body table-responsive">
                            <table style="font-weight: bold;" class="table table-condensed table-responsive">
                                <thead style="background-color: #455a64; color: white" >
                                  <tr>
                                    <th>Numero de Pedido</th>
                                    <th>Nombre de Usuario</th>
                                    <th>Correo</th>
                                    <th>Empresa</th>
                                    <th>Departamento</th>
                                    <th>Ultima vez conectado</th>
                                    <th>Cambiar Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($pedido as $p)
                                    <tr align="left">
                                        <td>{{$p->PedidoID}}</td>
                                        <td>{{$p->name}}</td>
                                        <td>{{$p->email}}</td>
                                        <td>{{$p->name_company}}</td>
                                        <td>{{$p->department}}</td>
                                        @if($p->status < 1)
                                            <td class="danger">Pendiente</td>
                                        @elseif($p->status > 0)
                                            <td class="success">Entregado</td>
                                        @endif
                                        <td>
                                            <a href=""><button type="button" class="btn btn-success" title="Entregado"><i class="fa fa-check" aria-hidden="true"></i></button></a>
                                            <a href=""><button type="button" class="btn btn-danger" title="Pendiente"><i class="fa fa-times" aria-hidden="true"></i></button></a>
                                        </td>
                                    </tr>
                                 @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #607d8b; color: white;">
                            <b style="color: white; font-size: 1.5em;">Pedido</b>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>SKU:</th>
                                        <th>Nombre</th>
                                        <th>Modelo</th>
                                        <th>Tamaño</th>
                                        <th>Unidad</th>
                                        <th>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pedido2 as $p)
                                    <tr align="left">
                                        <td>{{$p->PID}}</td>
                                        <td>{{$p->name}}</td>
                                        <td>{{$p->model}}</td>
                                        <td>{{$p->size}}</td>
                                        <td>{{$p->unit}}</td>
                                        <td>{{$p->price}}</td>
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
