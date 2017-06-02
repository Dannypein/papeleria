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
                            <b style="color: white; font-size: 1.5em;">Datos del usuario</b>
                        </div>

                        <!--*****FORM*****-->
                                <div class="panel-body">
                                    <div class="col-md-6">
                                    <div class="well"><h5>Datos Actuales</h5></div>
                                        <ul class="list-group">
                                            <li class="list-group-item"><h6>Correo anterior:</h6>&nbsp<b>{{$details->email}}</b></li>
                                            <li class="list-group-item"><h6>Nombre Anterior:</h6>&nbsp<b>{{$details->name}}</b></li>
                                            <li class="list-group-item"><h6>Tipo de Rol del Usuario:</h6>&nbsp<b>{{$details->type}}</b></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <form method="POST" enctype="multipart/form-data" action="{{ action('AdminController@refresh') }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <fieldset>
                                                <div class="well"><h5>Nuevos Datos</h5></div>
                                                    <div class="list-group">
                                                        <div class="list-group-item ">
                                                            <input placeholder="Nuevo Correo" class="form-control" name="email" type="text" value="{{$details->email}}">
                                                        </div>
                                                        <div class="list-group-item ">
                                                            <input placeholder="Nuevo Nombre" class="form-control" name="name" type="text" value="{{$details->name}}">
                                                        </div>
                                                    </div>
                                                 <div class="alert alert-info">
                                                    <strong>Atención!</strong> El rol del usuario no se puede modificar.
                                                </div>
                                            <input type="submit" value="Guardar" class="btn btn-success">
                                            </fieldset>
                                        </form>
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
