@extends('layouts.main')

@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Confirmación de pago</h3>
                        <div class="box-tools no-margin pull-right"></div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="row">
                            <div style="text-align: center" class="col-md-6">

                                <br><br>

                                <i style="color: red" class="fa fa-thumbs-down fa-5x" aria-hidden="true"></i>
                                <br>
                                <h4>Pago declinado</h4>

                            </div>
                            <div style="text-align: center" class="col-md-6">

                                <h4>Su pago ha sido declinado</h4>

                                Su nuevo Balance es de: $ {{number_format($balance,2)}}
                                <br><br>
                                <br>
                                <div>
                                    {{Html::link('orders', 'Ver compras', ['class' => 'btn btn-flat btn-primary'])}}
                                </div>

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