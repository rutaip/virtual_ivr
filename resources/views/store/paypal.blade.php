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
                                <div class="box-body">
                                    <h4>Resumen previo a pago</h4>

                                    <table class="table table-responsive">
                                        <tr>
                                            <td>Monto de recarga</td>
                                            <td>$ {{number_format($amount,2)}} MXN</td>
                                        </tr>
                                        <tr>
                                            <td>Meses</td>
                                            <td>{{$months}}</td>
                                        </tr>
                                        <tr>
                                            <td>Subtotal $ {{number_format($amount,2)}} MXN x <strong>{{$months}}</strong> mes(es)</td>
                                            <td>$ {{number_format($subtotal,2)}} MXN</td>
                                        </tr>
                                        <tr>
                                            <td>IVA 16%</td>
                                            <td>$ {{number_format($tax, 2)}} MXN </td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <th>$ {{number_format($total, 2)}} MXN </th>
                                        </tr>

                                    </table>

                                </div>

                            </div>
                            <div style="text-align: center" class="col-md-6">

                                {{Html::script('https://www.paypalobjects.com/api/checkout.js')}}

                                <h4>Has seleccionado a Paypal como tu medio de pago</h4>

                                Para completar esta transacción selecciona el siguiente botón de Paypal
                                <br><br><br><br>
                                <div style="text-align: center;" id="paypal-button"></div>
                                <br>

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

    <script>
        paypal.Button.render({

            env: 'sandbox', // Optional: specify 'sandbox' environment

            locale: 'es_MX',

            style: {
                size: 'medium',
                color: 'gold',
                shape: 'rect',
                label: 'checkout'
            },

            client: {
                sandbox: 'AZe9DiThNRisC5g4u2qYAQQovHSZMoOqnjLFUpGLgz5Dc27fJ2OOFkPq79k3TRLojktSESm_6iUWxHrX',
                production: 'AV3zqgfOG2_r8J3y22VFnNW4vpmHCOZIQbks41Ubq3Mkj2Epqtq7-XJadGHvDnNdHz55f_S1gZw_8RrA'
            },


            payment: function (resolve, reject) {

                var CREATE_PAYMENT_URL = '{{ url('paypal/create-payment') }}';

                return paypal.request.post(CREATE_PAYMENT_URL, {_token: '{{csrf_token()}}', amount: '{{$subtotal}}', user: '{{$user}}', order: '{{$order}}', months: '{{$months}}'})
                    .then(function (data) {
                        console.log(data);
                        resolve(data.paymentID);
                    })
                    .catch(function (err) {
                        reject(err);
                    });
            },

            onAuthorize: function (data) {

                // Note: you can display a confirmation page before executing

                var EXECUTE_PAYMENT_URL = '{{ url('paypal/execute-payment') }}';

                return paypal.request.post(EXECUTE_PAYMENT_URL,
                    {paymentID: data.paymentID, payerID: data.payerID, _token: '{{csrf_token()}}'})

                    .then(function (data) {
                        console.log(data);

                        window.location = '{{url('store/confirmation')}}' + '/' + data.paymentID;
                    })
                    .catch(function (err) {
                        console.log('esta transaccion es erronea' + err)

                        window.location = '{{url('store/denied')}}' + '/' + '{{$order}}'

                    });
            }

        }, '#paypal-button');
    </script>

@endsection