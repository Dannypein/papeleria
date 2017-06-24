@extends('template.main')
@section('tittle'){{'title'}}@endsection
@section('content')
<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        @include('template.partials.menu')
            <main>
                 <!-- Content Row -->
                 @if (isset($enviado) && $enviado)
                    <div class="col-md-12">
                        <div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert"><i class="fa fa-close"></i></button>
                            <strong>Su correo se ha enviado con éxito. Pronto estaremos en contacto con usted. Gracias.</strong>
                        </div>
                    </div>
                 @endif
                <div class="col-md-2"></div>
                    <!-- Contact Details Column -->
                    <div class="col-md-8" style="background-color: white; font-weight: bold; font-size: 1.2em;">
                        <h3>Detalles de Contacto</h3>
                        <p>
                            Avenida Primaveras <br>N° 5<br>
                        </p>
                        <p><i class="fa fa-phone"></i> 
                            <abbr title="Phone">Telefono</abbr>: (01-314) 333-4810</p>
                        <p><i class="fa fa-envelope-o"></i> 
                            <abbr title="Email">Email</abbr>: <a href="">arlene.ventas@ofimedia.com.mx</a>
                        </p>
                        <p><i class="fa fa-clock-o"></i> 
                            <abbr title="Hours">Horario</abbr>: Lunes - Viernes: 9:00 AM A 2:00 PM y 4:00 PM A 7:00 PM
                            / Sabado: 9:00 AM A 2:00 PM</p>
                        <!--<ul class="list-unstyled list-inline list-social-icons">
                            <li>
                                <a href="#"><i class="fa fa-facebook-square fa-2x"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin-square fa-2x"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter-square fa-2x"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus-square fa-2x"></i></a>
                            </li>
                        </ul>-->
                    <div class="col-md-2"></div>
                </div>
                <!-- /.row -->
                <!-- Contact Form -->
                <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
                <div class="col-md-12">
                <br>
                <br>
                    <div class="col-md-3"></div>
                    <div class="col-md-6"  style="background-color: white;">
                        <h3>¡Mandanos un mensaje!</h3>
                        <form method='post' action="{{ route('contacto.correo') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <fieldset>
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Teléfono</label>
                                    <input type="phone" class="form-control" name="phone" placeholder="Teléfono">
                                </div>
                                <div class="form-group">
                                    <label for="comment">Comentario</label>
                                    <textarea class="form-control" name="comment" placeholder="Comentario"></textarea>
                                </div>
                                <div id="success"></div>
                                <!-- For success/fail messages -->
                                <button type="submit" class="btn btn-primary"  style="margin-bottom: 1em;">Enviar Mensaje</button>
                            </fieldset>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <!-- /.row -->
            </main>
        </div>
        <!--Footer content-->
        @include('template.partials.footer')
    </div>
</body>
@stop