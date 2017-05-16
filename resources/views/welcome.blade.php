<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Fastcode</title>

    <!-- Bootstrap 3.3.6 -->
{!! Html::style('css/bootstrap.min.css') !!}
{!! Html::style('css/AdminLTE.min.css') !!}

<!-- Font Awesome -->
{!! Html::style('css/font-awesome.min.css') !!}

<!-- Custom styles for this template  -->
{!! Html::style('css/navbar.css') !!}

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{!! Html::style('css/ie10-viewport-bug-workaround.css') !!}

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                </ul>
                @if (Route::has('login'))
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                            <li><a href="{{ url('/home') }}">Inicio</a></li>
                        @else
                            <li><a href="{{ url('/login') }}">Ingresar</a></li>
                            <li><a href="{{ url('/register') }}">Registarse</a></li>
                        @endif
                    </ul>
                @endif

            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="">

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="row">
                        <div class="col-md-8">
                            {{ Html::image('images/virtual_ivr.jpg', '', ['class' => 'img-responsive']) }}
                        </div>
                        <div class="col-md-4">
                            <h3>Virtual IVR</h3>
                            <br>
                            <p>Es un sistema de atención telefonica, sencillo, adaptable y fácil de configurar.</p>
                            <br>
                            <br>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-md-8">
                            {{ Html::image('images/virtual_ivr.jpg', '', ['class' => 'img-responsive']) }}
                        </div>
                        <div class="col-md-4">
                            <h3>¿Cómo funciona?</h3>
                            <br>
                            <p>Tus clientes llaman a un número telefónico, escuchan las opciones de tu menú,
                                seleccionan la opción deseada para comunicarse contigo y la llamada es transferida
                                al número fijo o celular que nos indiques.
                            </p>
                            <br>
                            <br>

                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-md-8">
                                <!--Paquete 1 -->
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="small-box bg-yellow">
                                            <div class="inner">
                                                <h3>$490 mxn</h3>
                                                <p>+ iva (mensual)</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-cart-plus fa-lg"></i>
                                            </div>
                                            <div class="small-box-footer">
                                                <a href="{{ url('dids/create') }}" style="color:white">Quiero este
                                                    paquete! <i class="fa fa-arrow-circle-right"></i></a>
                                                | <a href="#" style="color:white" data-toggle="modal"
                                                     data-target="#myModal1">Más información <i
                                                            class="fa fa-question-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Paquete 2 -->
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="small-box bg-aqua">
                                            <div class="inner">
                                                <h3>$950 mxn</h3>
                                                <p>+ iva (mensual)</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-cart-plus fa-lg"></i>
                                            </div>
                                            <div class="small-box-footer">
                                                <a href="{{ url('dids/create') }}" style="color:white">Quiero este
                                                    paquete! <i class="fa fa-arrow-circle-right"></i></a>
                                                | <a href="#" style="color:white" data-toggle="modal"
                                                     data-target="#myModal3">Más información <i
                                                            class="fa fa-question-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Paquete 3 -->
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="small-box bg-green">
                                            <div class="inner">
                                                <h3>$750 mxn</h3>
                                                <p>+ iva (mensual)</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-cart-plus fa-lg"></i>
                                            </div>
                                            <div class="small-box-footer">
                                                <a href="{{ url('dids/create') }}" style="color:white">Quiero este
                                                    paquete! <i class="fa fa-arrow-circle-right"></i></a>
                                                | <a href="#" style="color:white" data-toggle="modal"
                                                     data-target="#myModal2">Más información <i
                                                            class="fa fa-question-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-4">
                            <h3>¿Cuales son los paquetes?</h3>
                            <br>
                            <p>Nuestros paquetes contienen diferentes opciones, .
                            </p>
                            <br>
                            <br>

                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-md-8">
                            {{ Html::image('images/virtual_ivr.jpg', '', ['class' => 'img-responsive']) }}
                        </div>
                        <div class="col-md-4">
                            <h3>¿Cómo contrato?</h3>
                            <br>
                            <p>Para contratar requieres:
                                <ul>
                                    <li>Crear una cuenta <a href="{{ url('/register') }}">aquí</a></li>
                                    <li>Seleccionar uno de nuestros <a href="#carousel-example-generic" data-slide-to="2">paquetes</a></li>
                                    <li>Ingresar los número donde recibirás tus llamadas (casa, celular, oficina)</li>
                                    <li>Subir el audio de tu menú (mp3)</li>
                                    <li>Elegir tu número virtual</li>
                                    <li>Realizar tu pago (Paypal, Tarjeta Credito, Deposito Bancario)</li>
                            </ul>
                            </p>
                            <br>
                            <br>

                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <br>

                <div class="row" style="text-align: center">
                {{Html::link('#carousel-example-generic', 'Inicio', ['data-slide-to' => '0', 'class' => 'btn', 'style' => 'font-size:20px;'])}} |
                {{Html::link('#carousel-example-generic', '¿Cómo funciona?', ['data-slide-to' => '1', 'class' => 'btn', 'style' => 'font-size:20px;'])}} |
                {{Html::link('#carousel-example-generic', '¿Cuáles son los paquetes?', ['data-slide-to' => '2', 'class' => 'btn', 'style' => 'font-size:20px;'])}} |
                {{Html::link('#carousel-example-generic', '¿Cómo contrato?', ['data-slide-to' => '3', 'class' => 'btn', 'style' => 'font-size:20px;'])}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal paquete 1-->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Paquete $490 mxn + iva</h3>
                </div>
                <div class="modal-body">
                    <ul class="treeview-menu">
                        <li>500 minutos al mes para llamadas transferidas-enrutadas</li>
                        <li>Número local para recibir llamadas (atiende 2 llamadas de manera simultanea)</li>
                        <li>3 extensiones enrutadas (casa, oficina, celular)</li>
                        <li>Mensaje de bienvenida con menú de opciones (Hasta 5 opciones y 1 nivel de menú)</li>
                        <li>Grupo de timbrado. (Timbrará en una o más extensiones a la vez)</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal paquete 2-->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Paquete $950 mxn + iva</h3>
                </div>
                <div class="modal-body">
                    <ul class="treeview-menu">
                        <li>500 minutos al mes para llamadas transferidas-enrutadas</li>
                        <li>Número local para recibir llamadas (atiende 2 llamadas de manera simultanea)</li>
                        <li>3 extensiones enrutadas (casa, oficina, celular)</li>
                        <li>Mensaje de bienvenida con menú de opciones (Hasta 5 opciones y 1 nivel de menú)</li>
                        <li>Grupo de timbrado. (Timbrará en una o más extensiones a la vez)</li>
                        <li>Buzón de voz vía email</li>
                        <li>Control de horario para enrutamiento de llamadas</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal paquete 3-->
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Paquete $750 mxn + iva</h3>
                </div>
                <div class="modal-body">
                    <ul class="treeview-menu">
                        <li>500 minutos al mes para llamadas transferidas-enrutadas</li>
                        <li>Número local para recibir llamadas (atiende 2 llamadas de manera simultanea)</li>
                        <li>3 extensiones enrutadas (casa, oficina, celular)</li>
                        <li>Mensaje de bienvenida con menú de opciones (Hasta 5 opciones y 1 nivel de menú)</li>
                        <li>Grupo de timbrado. (Timbrará en una o más extensiones a la vez)</li>
                        <li>Buzón de voz vía email</li>
                        <li>Control de horario para enrutamiento de llamadas</li>
                        <li>Click2dial</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery 2.2.3 -->
{!! Html::script('js/jquery-2.2.3.min.js') !!}
<!-- Bootstrap 3.3.6 -->
{!! Html::script('js/bootstrap.min.js') !!}
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{!! Html::script('js/ie10-viewport-bug-workaround.js') !!}
</body>
</html>

