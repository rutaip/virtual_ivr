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
                                            <td>Subtotal $ {{number_format($amount,2)}} MXN x
                                                <strong>{{$months}}</strong> mes(es)
                                            </td>
                                            <td>$ {{number_format($subtotal,2)}} MXN</td>
                                        </tr>
                                        <tr>
                                            <td>IVA 16%</td>
                                            <td>$ {{number_format($tax, 2)}} MXN</td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <th>$ {{number_format($total, 2)}} MXN</th>
                                        </tr>

                                    </table>

                                </div>

                            </div>
                            <div style="text-align: center" class="col-md-6">

                                <h4>Has seleccionado a PayU como tu medio de pago</h4>

                                Para completar esta transacción selecciona el siguiente botón de PayU

                                {!! Form::open(array('url' => 'https://gateway.payulatam.com/ppp-web-gateway/', 'role' => 'form')) !!}



                                <input name="merchantId" type="hidden" value="{{$merchantid}}">
                                <input name="accountId" type="hidden" value="{{$accountid}}">
                                <input name="description" type="hidden" value="Recarga de Servicio Virtual IVR">
                                <input name="referenceCode" type="hidden" value={{$order}}>
                                <input name="amount" type="hidden" value="{{$total}}">
                                <input name="tax" type="hidden" value="0">
                                <input name="taxReturnBase" type="hidden" value="0">
                                <input name="currency" type="hidden" value="{{$currency}}">
                                <input name="signature" type="hidden" value="{{$signature}}">
                                <input name="test" type="hidden" value="1">
                                <input name="buyerEmail" type="hidden" value="{{$user_email}}">
                                <input name="responseUrl" type="hidden" value="{{url('payu/response')}}">
                                <input name="confirmationUrl" type="hidden" value="{{url('payu/confirmation')}}">

                                <br><br><br><br>
                                <div style="text-align: center;"></div>
                                {!! Form::submit('Pagar') !!}
                                <br>
                                {!! Form::close() !!}
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
@endsection