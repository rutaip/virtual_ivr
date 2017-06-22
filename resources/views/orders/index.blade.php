@extends('layouts.main')

@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ordenes de Compra</h3>

                        <div class="box-tools no-margin pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tr>
                                <th>Monto</th>
                                <th>Transacción</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                            </tr>

                            @foreach($orders as $order)
                                <tr>
                                    <td>$ {{number_format($order->amount, 2)}}</td>
                                    <td>{{$order->order}}</td>
                                    <td>@if($order->status === '2')
                                            Aprobado
                                        @elseif($order->status === '3')
                                            Rechazado
                                        @elseif($order->status === '4')
                                            Pendiente
                                        @elseif($order->status === '5')
                                            Expirado
                                        @elseif($order->status === '6')
                                            Reembolso
                                        @else
                                            Creado
                                        @endif
                                    </td>
                                    <td>{{$order->created_at}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            {{$orders->links()}}
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