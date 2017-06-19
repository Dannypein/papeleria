@extends('template.main')
@section('tittle'){{'title'}}@endsection
@section('content')
<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        @include('app')
            <main>
                <div class="col-md-3">
                    <p class="lead list-group-item"><b>Acciones</b></p>
                    <div class="list-group">
                        <a href="{{route('nueva_empresa')}}" class="list-group-item">Nueva Empresa</a>
                        <a href="{{route('nuevo_depa')}}" class="list-group-item">Nuevo Departamento</a>
                    </div>
                </div>
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
                            <a href="{{ url('/admin') }}"><button class="btn" style="float: left;">Regresar</button></a>
                            <b style="color: white; font-size: 1.5em;">Empresas Registradas</b>
                        </div>
                        <div class="panel-body table-responsive">
                            <table style="font-weight: bold;" class="table table-striped table-responsive">
                                <thead style="background-color: #455a64; color: white" >
                                  <tr>
                                    <th>Nombre de la Empresa</th>
                                    <th>Dirrección</th>
                                    <th>Telefono</th>
                                    <th>Acciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($empresa as $e)
                                      <tr align="left">
                                        <td>{{$e->name_company}}</td>
                                        <td>{{$e->address_company}}</td>
                                        <td>{{$e->phone}}</td>
                                        <td>
                                            <a href="{{route('edit_empresa', [$e->id])}}"><button type="button" class="btn btn-info" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        </td>
                                      </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 pull-right">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #607d8b; color: white;">
                            <b style="color: white; font-size: 1.5em;">Departamentos Registrados</b>
                        </div>
                        <div class="panel-body table-responsive">
                            <table style="font-weight: bold;" class="table table-striped table-responsive">
                                <thead style="background-color: #455a64; color: white" >
                                  <tr>
                                    <th>Nombre del departamento</th>
                                    <th>Fecha de Creacion</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($empresa2 as $e)
                                      <tr align="left">
                                        <td>{{$e->department}}</td>
                                        <td>{{$e->created_at}}</td>
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
