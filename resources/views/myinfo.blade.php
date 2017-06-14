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
                            <b style="color: white; font-size: 1.5em;">Pedidos</b>
                        </div>
                        <div class="panel-body">
                            <div class="panel-body">
                                    <div class="col-md-6">
                                        <div class="well"><h5>Mis Datos</h5></div>
                                        @foreach($user as $u)
                                        <ul class="list-group">
                                            <li class="list-group-item"><h6>Nombre:</h6>&nbsp<b>{{$u->name}}</b></li>
                                            <li class="list-group-item"><h6>Correo:</h6>&nbsp<b>{{$u->email}}</b></li>
                                            <li class="list-group-item"><h6>Empresa:</h6>&nbsp<b>{{$u->name_company}}</b></li>
                                            <li class="list-group-item"><h6>Departamento:</h6>&nbsp<b>{{$u->department}}</b></li>
                                        </ul>
                                        @endforeach
                                    </div>
                                    <div class="col-md-6">
                                        <form method="POST" enctype="multipart/form-data" action="/desktop/usuarios/{{$u->id}}/update">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <fieldset>
                                                <div class="well"><h5>Nuevos Datos</h5></div>
                                                    <div class="list-group">
                                                        <div class="list-group-item ">
                                                            <input placeholder="Nuevo Nombre" class="form-control" name="name" type="text" value="">
                                                        </div>
                                                        <div class="list-group-item ">
                                                            <input placeholder="Nueva Contraseña" class="form-control" name="password" type="password" value="">
                                                        </div>
                                                    </div>
                                                 <div class="alert alert-info">
                                                    <strong>Atención!</strong> La empresa y departamento no se puede modificar.
                                                </div>
                                            <input type="submit" value="Actualizar" class="btn btn-success">
                                            </fieldset>
                                        </form>
                                    </div>
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
