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
                            <a href="{{ url('/admin/empresas') }}"><button class="btn" style="float: left;">Regresar</button></a>
                            <b style="color: white; font-size: 1.5em;">Datos del usuario</b>
                        </div>

                        <!--*****FORM*****-->
                                <div class="panel-body">
                                    <div class="col-md-6">
                                    <div class="well"><h5>Datos Actuales</h5></div>
                                        <ul class="list-group">
                                            <li class="list-group-item"><h6>Nombre de la Empresa:</h6>&nbsp<b>{{$company->name_company}}</b></li>
                                            <li class="list-group-item"><h6>Dirrección de la Empresa:</h6>&nbsp<b>{{$company->address_company}}</b></li>
                                            <li class="list-group-item"><h6>Telefono de la Empresa:</h6>&nbsp<b>{{$company->phone}}</b></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <form method="POST" enctype="multipart/form-data" action="/admin/empresas/editar/empresa/{{$company->id}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <fieldset>
                                                <div class="well"><h5>Nuevos Datos</h5></div>
                                                    <div class="list-group">
                                                        <div class="list-group-item ">
                                                            <input placeholder="Nombre" class="form-control" name="name_company" type="text" value="{{$company->name_company}}">
                                                        </div>
                                                        <div class="list-group-item ">
                                                            <input placeholder="Dirrección" class="form-control" name="address_company" type="text" value="{{$company->address_company}}">
                                                        </div>
                                                        <div class="list-group-item ">
                                                            <input placeholder="Telefono" class="form-control" name="phone" type="text" value="{{$company->phone}}">
                                                        </div>
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
