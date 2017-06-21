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
                            <a href="{{ url('/admin/usuarios') }}"><button class="btn" style="float: left;">Regresar</button></a>
                            <b style="color: white; font-size: 1.5em;">Nuevo Usuario</b>
                        </div>
                        <div class="panel-body">
                            <form method="POST" enctype="multipart/form-data" action="/admin/usuarios/nuevo/usuario/create">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                        <div class="list-group">
                                            <div class="list-group-item ">
                                                <b><input placeholder="Nombre" class="form-control" name="name" type="text" value=""></b>
                                            </div>
                                            <div class="list-group-item ">
                                                <b><input placeholder="Correo" class="form-control" name="email" type="text" value=""></b>
                                            </div>
                                            <div class="list-group-item ">
                                                <b><input placeholder="Contraseña" class="form-control" name="password" type="password" value=""></b>
                                            </div>
                                            <h6 style="font-weight: bold">Departamento</h6>
                                            @foreach($user as $u)
                                            <div class="checkbox" align="left">
                                                <label><input type="checkbox" name="department_id" value="{{$u->id}}">&nbsp{{$u->department}}</label>
                                            </div>
                                            @endforeach
                                            <h6 style="font-weight: bold;">Empresa</h6>
                                            @foreach($user2 as $u2)
                                            <div class="checkbox" align="left">
                                                <label><input type="checkbox" name="company_id" value="{{$u2->id}}">&nbsp{{$u2->name_company}}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                <input type="submit" value="Guardar" class="btn btn-success">
                                </fieldset>
                            </form>
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
