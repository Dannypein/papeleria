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
                        <a href="{{route('nuevo')}}" class="list-group-item">Nuevo Usuario</a>
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
                        <b style="color: white; font-size: 1.5em;">Usuarios Registrados</b>
                    </div>
                    <div class="panel-body table-responsive">
                        <table style="font-weight: bold;" class="table table-condensed table-responsive">
                            <thead style="background-color: #455a64; color: white" >
                              <tr>
                                <th>Nombre de Usuario</th>
                                <th>Correo</th>
                                <th>Empresa</th>
                                <th>Departamento</th>
                                <th>Ultima vez conectado</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($user as $users)
                                  <tr align="left">
                                    <td>{{$users->name}}</td>
                                    <td>{{$users->email}}</td>
                                    <td>{{$users->name_company}}</td>
                                    <td>{{$users->department}}</td>
                                    <td>{{$users->updated_at}}</td>
                                    <td>
                                        <a href="{{route('edit', [$users->id])}}"><button type="button" class="btn btn-info" title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        <a href="/admin/usuarios/{{$users->id}}/delete"><button type="button" class="btn btn-danger" title="Eliminar"><i class="fa fa-times-circle" aria-hidden="true"></i></button></a>
                                    </td>
                                  </tr>
                              @endforeach
                            </tbody>
                        </table>
                        <?php echo $user->render() ?>
                    </div>
                </div>
            </main>
        </div>
        <!--Footer content-->
        @include('template.partials.footer')
    </div>
</body>
@stop
