@extends('template.main')
@section('tittle'){{'title'}}@endsection
@section('content')
<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        @include('app')
            <main>
                @if(\Session::has('alert'))
                <div class="col-md-12">
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
                        <strong>{{Session::get('alert')}}</strong>
                    </div>
                </div>
                @endif
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #607d8b; color: white;">
                        <a href="{{ url('/desktop') }}"><button class="btn" style="float: left;">Regresar</button></a>
                        <b style="color: white; font-size: 1.5em;">Mis Pedidos</b>
                    </div>
                    <div class="panel-body table-responsive">
                        <table style="font-weight: bold;" class="table table-condensed table-responsive">
                            <thead style="background-color: #455a64; color: white" >
                              <tr>
                                <th>Numero de Pedido</th>
                                <th>Realizado Por</th>
                                <th>Total de Articulos</th>
                                <th>Total en Pesos</th>
                                <th>Fecha de Creación</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                 @foreach($empresa as $p)
                                      <tr align="left">
                                        <td>{{$p->PedidoID}}</td>
                                        <td>{{$p->name}}</td>
                                        <td>{{$p->total_products}}</td>
                                        <td>{{$p->precio_total}}</td>
                                        <td>{{$p->created_at}}</td>
                                        @if($p->status < 1)
                                            <td class="danger">Pendiente</td>
                                        @elseif($p->status > 0)
                                            <td class="success">Entregado</td>
                                        @endif
                                        <td>
                                            <a href="{{route('pedido_show', [$p->PedidoID])}}"><button type="button" class="btn btn-info" title="Revisar"><i class="fa fa-list-alt" aria-hidden="true"></i></button></a>
                                        </td>
                                      </tr>
                                  @endforeach
                            </tbody>
                        </table>
                    </div>
                    <?php echo $empresa->render() ?>
                </div>
            </main>
        </div>
        <!--Footer content-->
        @include('template.partials.footer')
    </div>
</body>
@stop
