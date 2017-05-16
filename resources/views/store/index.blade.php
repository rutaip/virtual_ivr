@extends('layouts.main')

@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Realicemos tu pago</h3>
                        <div class="box-tools no-margin pull-right"></div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">

                                {{Html::script('https://www.paypalobjects.com/api/checkout.js')}}

                                Cómo deseas realizar tu pago?

                                Antes de iniciar valide que tiene saldo suficiente en su cuenta para crear un
                                Virtual
                                IVR
                                <br><br>
                                <div id="paypal-button"></div>
                                <br>

                                <ul class="treeview-menu">
                                    <li>Seleccione el paquete</li>
                                    <li>Seleccione su número, periodo y autorenovación</li>
                                    <li>Ingrese sus números telefónicos a los cuales se transferirá</li>
                                    <li>Añada el audio de su menú</li>
                                    <li>Configure las opciones de su menú</li>
                                </ul>

                                Seleccione el plan deseao del panel del lado izquierdo para comenzar.

                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
        </div>
        <!-- /.box -->
        <!-- /.col -->
        <!-- /.row -->
    </section>
    <!-- /.content -->

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

    <script>
        paypal.Button.render({

            env: 'sandbox', // Optional: specify 'sandbox' environment

            locale: 'es_MX',

            style: {
                size: 'medium',
                color: 'blue',
                shape: 'rect',
                label: 'checkout'
            },

            client: {
                sandbox:    'AZe9DiThNRisC5g4u2qYAQQovHSZMoOqnjLFUpGLgz5Dc27fJ2OOFkPq79k3TRLojktSESm_6iUWxHrX',
                production: 'AV3zqgfOG2_r8J3y22VFnNW4vpmHCOZIQbks41Ubq3Mkj2Epqtq7-XJadGHvDnNdHz55f_S1gZw_8RrA'
            },


            payment: function(resolve, reject) {

                var CREATE_PAYMENT_URL = '{{ url('paypal/create-payment') }}';

                return paypal.request.post(CREATE_PAYMENT_URL, {_token: '{{csrf_token()}}' })
                    .then(function(data) { console.log(data); resolve(data.paymentID); })
                    .catch(function(err) { reject(err); });
            },

            onAuthorize: function(data) {

                // Note: you can display a confirmation page before executing

                var EXECUTE_PAYMENT_URL = '{{ url('paypal/execute-payment') }}';

                return paypal.request.post(EXECUTE_PAYMENT_URL,
                    { paymentID: data.paymentID, payerID: data.payerID, _token: '{{csrf_token()}}' })

                    .then(function(data) { window.location = '{{url('store/confirmation')}}' })
                    .catch(function(err) { console.log('esta transaccion es erronea') });
            }

        }, '#paypal-button');
    </script>

@endsection