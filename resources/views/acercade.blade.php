
@extends('template.main')
@section('tittle'){{'title'}}@endsection
@section('content')
<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        @include('template.partials.menu')
            <main>
            <div class="col-md-1"></div>

                <div class="col-md-10">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            <b style="color: white;">Conócenos...</b>
                        </h2>
                    </div>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4><i class="fa fa-users" aria-hidden="true"></i> Quienes somos</h4></div>
                            <div class="panel-body">
                                <p style="font-size: 1.5em; font-weight: bold;">
                                    Somos una empresa nacional con sede en Guadalajara, Jalisco.       Dedicada a la distribución de artículos de papelería, artículos de oficina y Computo.    Nuestra empresa ofrece un centro de atención al cliente y distribución y empaque de mayoreo.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default" style=" height: 225.5px">
                            <div class="panel-heading">
                                <h4><i class="fa fa-rocket" aria-hidden="true"></i> Mision</h4>
                            </div>
                            <div class="panel-body">
                                <p>Cubrir las principales necesidades de nuestros clientes, como lo son: atención, servicio, calidad, precio y entrega a tiempo.    Brindando atención personalizada basada en la ética y profesionalismo de nuestro capital humano y el uso de la tecnología.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default" style=" height: 225.5px">
                            <div class="panel-heading">
                                <h4><i class="fa fa-eye" aria-hidden="true"></i> Vision</h4>
                            </div>
                            <div class="panel-body">
                                <p>Trascender como una empresa dedicada al servicio, cumpliendo con los estándares de calidad en nuestra atención y comercialización de artículos.     Caracterizados por nuestra presencia ya fortalecida en el mercado</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-default" style=" height: 225.5px">
                            <div class="panel-heading">
                                <h4><i class="fa fa-shield" aria-hidden="true"></i> Valores</h4>
                            </div>
                            <div class="panel-body">
                                <ul>
                                    <li>Ética profesional, Responsabilidad</li>
                                    <li>Compromiso, Integridad</li>
                                    <li>Respeto, Espíritu de trabajo</li>
                                    <li>Honestidad, Dinamismo</li>
                                    <li>Lealtad</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4><i class="fa fa-bullseye" aria-hidden="true"></i> Objetivo</h4></div>
                            <div class="panel-body">
                                <p style="font-size: 1.5em;">
                                    Ejecutar un plan de trabajo, en el que se describa los requerimientos y necesidades que se deben lograr, con la función de alcanzar la máxima  sustentabilidad, calidad  y crecimiento.     Que nos permitirán cumplir  objetivos en diferentes ámbitos: 
                                </p>
                                <ul>
                                    <li>Capital Humano: Mantener un ambiente laborar agradable y motivador donde nuestros colaboradores se sienten inspirados a dar una calidad y atención en el servicio con lo mejor de sí mismos, día a día.</li>
                                    <li>Servicio: Satisfacer las necesidades de nuestros clientes, extendiendo nuestra cartera de artículos e innovar en estrategias de calidad. </li>
                                    <li>Socios: :  Desarrollar una red de trabajo para crear un valor común y duradero.</li>
                                    <li>Productividad: Ser una organización eficaz y duradera.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-1"></div>
            </main>
        </div>
        <!--Footer content-->
        @include('template.partials.footer')
    </div>
</body>
@stop