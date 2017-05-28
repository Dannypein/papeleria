<!DOCTYPE html>
<html lang="es">
	<head>
		<title>@yield('title', 'Papeleria')</title>

		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<link rel="shorcut icon" href="{{{ asset('/img/icon.png') }}}" type="image/png" sizes="16x16">
		

		 <!-- Bootstrap CSS -->
	    <link href="/css/shop-homepage.css" rel="stylesheet">
	    <link href="/css/heroic-features.css" rel="stylesheet">

	    <!-- Custom CSS -->
	    <link href="/css/styles.css" rel="stylesheet">

	    <!--Bootstrap MAXCDN Custom Menu CSS-->
	    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/paper/bootstrap.min.css" rel="stylesheet" integrity="sha384-awusxf8AUojygHf2+joICySzB780jVvQaVCAt1clU3QsyAitLGul28Qxb2r1e5g+" crossorigin="anonymous">

	    <!--Custom Fonts-->
	    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

	    <!--Custom Icons-->
	    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">

	    <!-- jQuery -->
	    <script src="/js/jquery.js"></script>

	    <!-- Bootstrap JavaScript -->
	    <script src="/js/bootstrap.min.js"></script>

	</head>
	<body>
		@yield('content')
	</body>
</html>
