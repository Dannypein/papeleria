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
                            <a href="{{ url('/admin/creditos') }}"><button class="btn" style="float: left;">Regresar</button></a>
                            <b style="color: white; font-size: 1.5em;">Datos del usuario</b>
                        </div>

                        <div class="panel-body">
                            <div class="col-md-6">
                            <div class="well"><h5>Datos Actuales</h5></div>
                                <ul class="list-group">
                                @foreach($credit as $c)
                                    <li class="list-group-item"><h6>Nombre de Usuario:</h6>&nbsp<b>{{$c->name}}</b></li>
                                    <li class="list-group-item"><h6>Departamento:</h6>&nbsp<b>{{$c->department}}</b></li>
                                    <li class="list-group-item"><h6>Limite de Credito Actual:</h6>&nbsp<b>{{$c->credit_limit}}</b></li>
                                @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <form method="POST" enctype="multipart/form-data" action="/admin/creditos/nuevo/credito/{{$c->userID}}/nuevo">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <fieldset>
                                        <div class="well"><h5>Nuevos Datos</h5></div>
                                            <div class="list-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                    <input placeholder="Nuevo crédito" class="form-control" name="credit_limit" type="number" value="{{$c->credit_limit}}">
                                              </div>
                                            </div>
                                         <div class="alert alert-warning">
                                            <strong>¡Atención!&nbsp</strong>Al aumentar o disminuir el límite de crédito podría afectar futuros datos, se recomienda mover esta opción solo una vez.
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
