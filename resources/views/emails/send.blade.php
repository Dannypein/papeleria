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
            @foreach ($products as $product)
        		<tr>
        			<td>{{ $product['sku'] }}</td>
        			<td>{{ $product['nombre'] }}</td>
                    <td>{{ $product['precio_unitario'] }}</td>
                    <td>{{ $product['cantidad'] }}</td>
        			<td>{{ $product['subtotal'] }}</td>
        		</tr>
            @endforeach
    	</tbody>
    </table>
</body>
</html>