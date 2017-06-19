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
                            <a href="{{ url('/admin') }}"><button class="btn" style="float: left;">Regresar</button></a>
                            <b style="color: white; font-size: 1.5em;">Créditos Asignados</b>
                        </div>
                        <div class="panel-body">
                            <table style="font-weight: bold;" class="table table-striped table-responsive">
                                <thead style="background-color: #455a64; color: white" >
                                  <tr>
                                    <th>Nombre de Usuario</th>
                                    <th>Correo Electrónico</th>
                                    <th>Departamento</th>
                                    <th>Crédito máximo asignado</th>
                                    <th>Cambiar límite de crédito</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($credit as $c)
                                      <tr align="left">
                                        <td>{{$c->name}}</td>
                                        <td>{{$c->email}}</td>
                                        <td>{{$c->department}}</td>
                                        @if($c->credit_limit < 1)
                                            <td class="danger">{{$c->credit_limit}}</td>
                                        @elseif($c->credit_limit > 0)
                                            <td class="success">{{$c->credit_limit}}</td>
                                        @endif
                                        <td>
                                            <a href="{{route('editar_credito', [$c->userID])}}"><button type="button" class="btn btn-info" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        </td>
                                      </tr>
                                  @endforeach
                                </tbody>
                            </table>
                            <?php echo $credit->render() ?>
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
