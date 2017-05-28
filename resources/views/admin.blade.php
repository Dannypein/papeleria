@extends('template.main')
@section('tittle'){{'title'}}@endsection
@section('content')
<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        @include('app')
            <main>
              @include('template.partials.menu-left-admin')
              <div class="col-md-9">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>Usuarios Registrados</h4><button class="button btn-primary" onclick="myFunction()">Mostrar/Ocultar</button>
                    </div>
                    <div class="panel-body" id="myDIV">
                      <table class="table table-striped table-responsive">
                        <thead>
                          <tr>
                            <th>Nombre de Usuario</th>
                            <th>Tipo</th>
                            <th>Correo</th>
                            <th>Ultima vez conectado</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($user as $users)
                              <tr align="left">
                                <td>{{$users->name}}</td>
                                <td>{{$users->type}}</td>
                                <td>{{$users->email}}</td>
                                <td>{{$users->updated_at}}</td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4>Pedidos</h4><button class="button btn-primary" onclick="myFunction2()">Mostrar/Ocultar</button>
                    </div>
                    <div class="panel-body" id="myDIV2">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Default</td>
                            <td>Defaultson</td>
                            <td>def@somemail.com</td>
                          </tr>      
                          <tr class="success">
                            <td>Success</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                          </tr>
                          <tr class="danger">
                            <td>Danger</td>
                            <td>Moe</td>
                            <td>mary@example.com</td>
                          </tr>
                          <tr class="info">
                            <td>Info</td>
                            <td>Dooley</td>
                            <td>july@example.com</td>
                          </tr>
                          <tr class="warning">
                            <td>Warning</td>
                            <td>Refs</td>
                            <td>bo@example.com</td>
                          </tr>
                          <tr class="active">
                            <td>Active</td>
                            <td>Activeson</td>
                            <td>act@example.com</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </main>
        </div>
        <!--Footer content-->
        @include('template.partials.footer')
    </div>
    <script>
      function myFunction() {
          var x = document.getElementById('myDIV');
          if (x.style.display === 'none') {
              x.style.display = 'block';
          } else {
              x.style.display = 'none';
          }
      }

       function myFunction2() {
          var x = document.getElementById('myDIV2');
          if (x.style.display === 'none') {
              x.style.display = 'block';
          } else {
              x.style.display = 'none';
          }
      }
    </script>
</body>
@stop
