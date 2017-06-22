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
                                    <th>Crédito Asignado</th>
                                    <th>Fecha de Creacion</th>
                                    <th>Estatus</th>
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
                                        <td>{{$p->credit_limit}}</td>
                                        <td>{{$p->Pcreate}}</td>
                                        @if($p->status < 1)
                                            <td class="danger">Pendiente</td>
                                        @elseif($p->status > 0)
                                            <td class="success">Entregado</td>
                                        @endif
                                        <td>

                                        <form method="POST" enctype="multipart/form-data" action="/admin/pedidos/status/update/{{$p->PedidoID}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <fieldset>
                                                <div class="radio">
                                                    <label><input type="radio" name="status" value="1" @if($p->status == 1) checked @endif>Entregado</label>
                                                    <br>
                                                    <label><input type="radio" name="status" value="0" @if($p->status == 0) checked @endif>Pendiente</label>
                                                </div>
                                                <button type="submit" class="btn btn-success" title="Cambiar"><i class="fa fa-check" aria-hidden="true"></i>&nbspCambiar</button>
                                            </fieldset>
                                        </form>

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
                                        <th>Cantidad de Productos</th>
                                        <th>Precio Unitario</th>
                                        <th>SubTotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($productos as $p)
                                    <tr align="left">
                                        <td>{{$p->id}}</td>
                                        <td>{{$p->nombre}}</td>
                                        <td>{{$p->cantidad}}</td>
                                        <td>$   {{$p->precio_unitario}}</td>
                                        <td>$   {{$p->subtotal}}</td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Total:  {{ number_format(collect($productos)->sum('subtotal'), 2) }}</b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="well" style="background-color: #eee;">
                            <span><b>Detalles del pedido:</b></span>
                            <br>
                                @foreach($pedido as $p){{$p->details}}@endforeach
                            </div>
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
