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
                        <a href="" class="list-group-item">Nuevo Usuario</a>
                    </div>
                </div>
                <div class="col-md-9">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>Usuarios Registrados</h4>
                    </div>
                    <div class="panel-body table-responsive">
                        <table style="font-weight: bold;" class="table table-striped table-responsive">
                            <thead style="background-color: #455a64; color: white" >
                              <tr>
                                <th>Nombre de Usuario</th>
                                <th>Tipo</th>
                                <th>Correo</th>
                                <th>Ultima vez conectado</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($user as $users)
                                  <tr align="left">
                                    <td>{{$users->name}}</td>
                                    <td>{{$users->type}}</td>
                                    <td>{{$users->email}}</td>
                                    <td>{{$users->updated_at}}</td>
                                    <td>
                                        <a href="{{route('edit', [$users->id])}}"><button type="button" class="btn btn-info" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        <a href=""><button type="button" class="btn btn-danger" title="Eliminar"><i class="fa fa-times-circle" aria-hidden="true"></i></button></a>
                                    </td>
                                  </tr>
                              @endforeach
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
