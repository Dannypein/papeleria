<form action="/desktop/usuarios/catalogo/agregar/{{$p->id}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <td>
        <input type="number" name="total_products" value="1" min="1" max="500">
        <input type="hidden" name="articulos[][precio_unitario]" value="{{$p->price}}">
    </td>
    <td>
        <a><button type="submit" class="btn btn-primary" title="agregar"><i class="fa fa-cart-plus" aria-hidden="true"></i></button></a>
    </td>
</form>