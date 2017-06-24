<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/paper/bootstrap.min.css" rel="stylesheet" integrity="sha384-awusxf8AUojygHf2+joICySzB780jVvQaVCAt1clU3QsyAitLGul28Qxb2r1e5g+" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container" style="background-color: #3f51b5;">
		<div class="row">
			<div class="col-md-12">
				<div>
					<img class="img-responsive" style="width: 100%; height: 100%;" src="http://ofimediapapeleria.com/img/ofimedia.png">
				</div>
				<br>
				<div class="panel panel-default" align="center">
				 	<div class="panel-heading" style="background-color: #eee"><h2>Nuevo Correo de Contacto</h2></div>
				 	<div class="panel-body" style="color: white;">
				 		<h3><i class="fa fa-id-card-o" aria-hidden="true"></i>	Datos del cliente</h3>
				 		<hr>
				 		<div class="well"><b>Nombre:</b>	{{ $name }}</div>
				 		<br>
				 		<div class="well"><b>Correo:</b>	{{ $email }}</div>
				 		<br>
				 		<div class="well"><b>Telefono:</b>	{{ $phone }}</div>
				 		<br>
				 		<div class="well"><b>Mensaje:</b>
				 			<p>{{ $comment }}</p>
				 		</div>
				 	</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<footer style="color: white;">
		    <div class="col-lg-12" align="center">
		        <hr>
		        <p>Copyright &copy; Ofimedia Papeleria, 2017</p>
		        <br>
		        <br>
		    </div>
		</footer>
	</div>
</body>
</html>