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
                            <b style="color: white; font-size: 1.5em;">Nuevo Usuario</b>
                        </div>
                        <div class="panel-body">
                            <form method="POST" enctype="multipart/form-data" action="/admin/empresas/nueva/empresa/create">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <fieldset>
                                        <div class="list-group">
                                            <div class="list-group-item ">
                                                <b><input placeholder="Nombre de la Empresa" class="form-control" name="name" type="text" value=""></b>
                                            </div>
                                            <div class="list-group-item ">
                                                <b><input placeholder="Dirrección" class="form-control" name="address" type="text" value=""></b>
                                            </div>
                                            <div class="list-group-item ">
                                                <b><input placeholder="Teléfono" class="form-control" name="phone" type="text" value=""></b>
                                            </div>
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
