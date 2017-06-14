@extends('template.main')
@section('tittle'){{'title'}}@endsection
@section('content')
<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        @include('app')
            <main>
                @include('template.partials.menu-left-normal')
                <div class="col-md-9">
                  <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading" style="background-color: #607d8b; color: white;">
                        <b style="color: white; font-size: 1.5em;">Pedidos Recientes</b><br>
                        <button id="btn3" class="button btn-primary">Ocultar</button><button id="btn4" class="button btn-primary">Mostrar</button>
                      </div>
                      <div class="panel-body" id="myDIV2">
                        <table class="table table-striped table-responsive">
                          <thead style="background-color: #455a64; color: white">
                            <tr>
                                <th>Numero de Pedido</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($pedidos as $p)
                                <tr align="left">
                                  <td>{{$p->id}}</td>
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
