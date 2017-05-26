@extends('layouts.main')

@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Compras</h3>

                        <div class="box-tools no-margin pull-right">
                            {!! Html::link('store', 'Añadir crédito', array('class' => 'btn btn-sm btn-success btn-flat pull-left')) !!}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tr>
                                <th>Método de pago</th>
                                <th>Monto</th>
                                <th>Transacción</th>
                                <th>Detalle</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                            </tr>

                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{$payment->payment_method}}</td>
                                    <td>$ {{number_format($payment->amount, 2)}}</td>
                                    <td>{{$payment->transaction_id}}</td>
                                    <td>{{Html::link('#', 'Más información', ['data-toggle' => 'modal', 'data-target' => '#myModal'.$payment->id])}}</td>
                                    <td>@if($payment->status === '2')
                                            Aprobado
                                        @elseif($payment->status === '3')
                                            Rechazado
                                        @elseif($payment->status === '4')
                                            Pendiente
                                        @else
                                            Creado
                                        @endif
                                    </td>
                                    <td>{{$payment->created_at}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            {{$payments->links()}}
                        </ul>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>

    </section>
    <!-- /.content -->

    @foreach($payments as $payment)
        <!-- Modal paquete 1-->
        <div class="modal fade" id="myModal{{$payment->id}}" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title" id="myModalLabel">Detalles de órden</h3>
                    </div>
                    <div class="modal-body">

                        <table class="table table-responsive">
                            <tr>
                                <td>Plan Virtual IVR</td>
                                <td>$ {{number_format($payment->order->amount,2)}} MXN</td>
                            </tr>
                            <tr>
                                <td>Meses</td>
                                <td>{{$payment->order->months}}</td>
                            </tr>
                            <tr>
                                <td>Subtotal $ {{number_format($payment->amount,2)}} MXN x
                                    <strong>{{$payment->order->months}}</strong> mes(es)
                                </td>
                                <td>
                                    $ {{number_format($payment->order->amount * $payment->order->months,2)}}
                                    MXN
                                </td>
                            </tr>
                            <tr>
                                <td>IVA 16%</td>
                                <td>
                                    $ {{number_format(($payment->order->amount * $payment->order->months) * 0.16 , 2)}}
                                    MXN
                                </td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <th>
                                    $ {{number_format(($payment->order->amount * $payment->order->months) * 1.16, 2)}}
                                    MXN
                                </th>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-flat"
                                data-dismiss="modal">Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin Modal -->
    @endforeach



@endsection