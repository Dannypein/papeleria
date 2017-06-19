@extends('template.main')
@section('tittle'){{'title'}}@endsection
@section('content')
<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        @include('app')
            <main>
              @include('template.partials.menu-left-admin')
              <div class="col-md-9">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>Usuarios Registrados</h4><button id="btn1" class="button btn-primary">Ocultar</button><button id="btn2" class="button btn-primary">Mostrar</button>
                    </div>
                    <div class="panel-body" id="myDIV">
                      <table class="table table-striped table-responsive">
                        <thead>
                          <tr>
                            <th>Nombre de Usuario</th>
                            <th>Tipo</th>
                            <th>Correo</th>
                            <th>Ultima vez conectado</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($user as $users)
                              <tr align="left">
                                <td>{{$users->name}}</td>
                                <td>{{$users->type}}</td>
                                <td>{{$users->email}}</td>
                                <td>{{$users->updated_at}}</td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <?php echo $user->render() ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>Pedidos Pendientes</h4><button id="btn3" class="button btn-primary">Ocultar</button><button id="btn4" class="button btn-primary">Mostrar</button>
                    </div>
                    <div class="panel-body" id="myDIV2">
                     <table style="font-weight: bold;" class="table table-condensed table-responsive">
                                <thead style="background-color: #455a64; color: white" >
                                  <tr>
                                    <th>Numero de Pedido</th>
                                    <th>Cliente</th>
                                    <th>Empresa</th>
                                    <th>Departamento</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($pedidos as $p)
                                      <tr align="left">
                                        <td>{{$p->PedidoID}}</td>
                                        <td>{{$p->name}}</td>
                                        <td>{{$p->name_company}}</td>
                                        <td>{{$p->department}}</td>
                                        <td>{{$p->total_products}}</td>
                                        <td>{{$p->precio_total}}</td>
                                        @if($p->status < 1)
                                            <td class="danger">Pendiente</td>
                                        @elseif($p->status > 0)
                                            <td class="success">Entregado</td>
                                        @endif
                                      </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          <?php echo $pedidos->render() ?>
                    </div>
                  </div>
                </div>
              </div>
            </main>
        </div>
        <!--Footer content-->
        @include('template.partials.footer')
    </div>
    <script>
    $(document).ready(function(){
      $("#btn1").click(function(){
         $("#myDIV").hide(500);
     });
    $("#btn2").click(function(){
        $("#myDIV").show(500);
      });
    });

    $(document).ready(function(){
      $("#btn3").click(function(){
         $("#myDIV2").hide(500);
     });
    $("#btn4").click(function(){
        $("#myDIV2").show(500);
      });
    });
    
    </script>
</body>
@stop
