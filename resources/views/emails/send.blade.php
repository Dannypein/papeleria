<html>
<head>
    <title></title>
</head>
<body>
    <div style="padding: 2.5em; width: 90%;">
        <h1>Pedido de Ofimedia Papeleria</h1>
        <h2>Datos del Pedido: </h2>
    </div>
    <table>
    	<thead>
    		<tr>
    			<th>SKU</th>
    			<th>Nombre</th>
    			<th>Precio Unitario</th>
                <th>Cantidad</th>
    			<th>Total</th>
    		</tr>
    	</thead>
    	<tbody>
        @foreach($datos as $d)
    		<tr>
    			<td>{{ $d->sku }}</td>
    			<td>{{ $d->nombre }}</td>
                <td>{{ $d->precio_u }}</td>
                <td>{{ $d->cantidad }}</td>
    			<td>{{ $d->total }}</td>
    		</tr>
        @endforeach
    	</tbody>
    </table>
</body>
</html>