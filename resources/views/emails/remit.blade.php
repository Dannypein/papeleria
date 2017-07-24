<html>
<head>
    <title></title>
</head>
<body>
    <div style="padding: 2.5em; width: 90%;">
        <h1>Pedido Reenviado de Ofimedia Papeleria</h1>
        <h2>Datos del Pedido: </h2>
    </div>
    <div>
        <table style="font-weight: bold;">
            <thead style="background-color: #455a64; color: white" >
              <tr>
                <th>Numero de Pedido</th>
                <th>Nombre de Usuario</th>
                <th>Correo</th>
                <th>Empresa</th>
                <th>Departamento</th>
                <th>Fecha de Creacion</th>
                <th>Estatus</th>
              </tr>
            </thead>
            <tbody>
            @foreach($pedido as $p)
                <tr align="left">
                    <td>{{$p->PedidoID}}</td>
                    <td>{{$p->name}}</td>
                    <td>{{$p->email}}</td>
                    <td>{{$p->name_company}}</td>
                    <td>{{$p->department}}</td>
                    <td>{{$p->Pcreate}}</td>
                    @if($p->status < 1)
                        <td class="danger">Pendiente</td>
                    @elseif($p->status > 0)
                        <td class="success">Entregado</td>
                    @endif
                </tr>
             @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <hr>
    <br>
    <table style="font-weight: bold;">
    	<thead style="background-color: #455a64; color: white">
    		<tr>
    			<th>SKU</th>
    			<th>Nombre</th>
    			<th>Precio Unitario</th>
                <th>Cantidad</th>
    			<th>Sub_Total</th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach ($products as $product)
                <tr>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->nombre }}</td>
                    <td>{{ $product->precio_unitario }}</td>
                    <td>{{ $product->cantidad }}</td>
                    <td>{{ $product->subtotal }}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Total:  {{ number_format(collect($products)->sum('subtotal'), 2) }}</b></td>
            </tr>
    	</tbody>
    </table>
    <div style="background-color: #eee;">
        <span><b>Detalles del pedido:</b></span>
        <br>
        @foreach($pedido as $p){{$p->details}}@endforeach
    </div>
</body>
</html>