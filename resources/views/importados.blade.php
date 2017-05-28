@extends('template.main')

@section('tittle'){{'title'}}@endsection

@section('content')
  <div class="container">
    <div class="row">
      @include('template.partials.menu')
      <main>
        <div class="col-xs-12 text-left" style="background-color: white; padding: 2em; color: black;">
          <h4>Artículos importados</h4>

          <p>Se importaron {{ count($articulos) }} artículos con éxito.</p>

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

          <div class="detalles">
            <h5>Total de artículos importados: {{ count($articulos) }}</h5>
            <h5>Total de artículos en la base de datos: {{ $total_articulos }}</h5>
          </div>

          <div class="acciones">
            <a href="{!! route('products.importar') !!}">Importar otro archivo</a>
          </div>
        </div>
      </main>
    </div>
    @include('template.partials.footer')
  </div>
@endsection
