@extends('template.main')

@section('tittle'){{'title'}}@endsection

@section('content')
  <div class="container">
    <div class="row">
      @include('template.partials.menu')
      <main>
        <div class="col-xs-12 text-left" style="background-color: white; padding: 2em; color: black;">
          <h4>Artículos importados</h4>

          <div class="well well-sm detalles">
            <h6>Total de artículos importados: {{ count($articulos) }}</h6>
            <h6>Tiempo: {{ $tiempo_segundos }} segundos</h6>
            <h6>Total de artículos en la base de datos: {{ $total_articulos }}</h6>
          </div>

          <div class="acciones">
            <a href="{!! route('products.importar') !!}"
               class="btn btn-primary">Importar otro archivo</a>
          </div>

          <hr class="separator">

          <table class="table table-condensed table-striped">
            <thead>
            <tr>
              <th>SKU</th>
              <th>Descripción</th>
              <th>Línea</th>
              <th>Modelo</th>
              <th>Talla</th>
              <th>Existencias</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($articulos as $articulo)
              <tr>
                <td>{{ data_get($articulo, 'sku') }}</td>
                <td>{{ data_get($articulo, 'name') }}</td>
                <td>{{ data_get($articulo, 'brand') }}</td>
                <td>{{ data_get($articulo, 'model') }}</td>
                <td>{{ data_get($articulo, 'size') }}</td>
                <td>{{ data_get($articulo, 'available') }}</td>
              </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>SKU</th>
              <th>Descripción</th>
              <th>Línea</th>
              <th>Modelo</th>
              <th>Talla</th>
              <th>Existencias</th>
            </tr>
            </tfoot>
          </table>
        </div>
      </main>
    </div>
    @include('template.partials.footer')
  </div>
@endsection
