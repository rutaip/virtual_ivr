@extends('layouts.app')

@section('content')
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
                <div class="row" style="text-align: center">
                    <br>
                    {!! Html::link('http://www.fastcode.today/aviso-de-privacidad', 'Aviso de Privacidad', ['target' => '_blank']) !!}
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

    <script type="text/javascript">
        var LHCChatOptions = {};
        LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500};
        (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
            var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
            po.src = '//help.fastcode.today/index.php/esp/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(hide_offline)/true/(top)/350/(units)/pixels/(leaveamessage)/true/(department)/1?r='+referrer+'&l='+location;
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
    </script>
@endsection