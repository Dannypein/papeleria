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
                        <form name="sentMessage" id="contactForm" novalidate>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Nombre Completo:</label>
                                    <input type="text" class="form-control" placeholder="Nombre" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Número de Telefono:</label>
                                    <input type="tel" class="form-control" placeholder="Telefono" id="phone" required data-validation-required-message="Please enter your phone number.">
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Dirrección de Email:</label>
                                    <input type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Please enter your email address.">
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>Menesaje:</label>
                                    <textarea rows="10" cols="100" class="form-control" placeholder="Menesaje" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                                </div>
                            </div>
                            <div id="success"></div>
                            <!-- For success/fail messages -->
                            <button type="submit" class="btn btn-primary"  style="margin-bottom: 1em;">Enviar Mensaje</button>
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