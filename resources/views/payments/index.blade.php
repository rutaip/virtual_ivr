@extends('layouts.main')

@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Extensiones</h3>

                        <div class="box-tools no-margin pull-right">
                            {!! Html::link('payments/create', 'Añadir crédito', array('class' => 'btn btn-sm btn-success btn-flat pull-left')) !!}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tr>
                                <th>Método de pago</th>
                                <th>Monto</th>
                                <th>Estado</th>
                                <th>Transacción</th>
                                <th>Fecha</th>
                            </tr>

                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{$payment->payment_method}}</td>
                                    <td>$ {{$payment->amount}}</td>
                                    <td>{{$payment->status}}</td>
                                    <td>{{$payment->transaction_id}}</td>
                                    <td>{{$payment->created_at}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
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

@endsection