<html>
<head>
    <title></title>
</head>
<body>
    <div style="padding: 2.5em; width: 90%;">
        <h1>Pedido de Ofimedia Papeleria</h1>
        <h2>Datos del cliente: </h2>
    </div>
    <table>
    	<thead>
    		<tr>
    			<th>SKU</th>
    			<th>Nombre</th>
    			<th>Cantidad</th>
    			<th>Precio Unitario</th>
    			<th>Subtotal</th>
    			<th>Total</th>
    		</tr>
    	</thead>
    	<tbody>
    		<tr>
    			<td>{{ $sku }}</td>
    			<td>{{ $nombre }}</td>
    			<td>{{ $precio_u }}</td>
    			<td>{{ $subtotal }}</td>
    			<td>{{ $total }}</td>
    		</tr>
    	</tbody>
    </table>
</body>
</html>