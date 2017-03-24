@extends('layouts.main')

@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">DID {{$did->did_number}}</h3>
                        <div class="box-tools no-margin pull-right"></div>
                    </div>
                    <!-- /.box-header -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body no-padding">
                                <table class="table">
                                    <tr>
                                        <th>País</th>
                                        <td>{{$did->country_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Ciudad</th>
                                        <td>{{$did->city_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Prefijo</th>
                                        <td>{{$did->city_prefix}}</td>
                                    </tr>
                                    <tr>
                                        <th>Número</th>
                                        <td>{{$did->did_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Estatus</th>
                                        <td>{{$did->did_status}}</td>
                                    </tr>
                                    <tr>
                                        <th># Orden</th>
                                        <td>{{$did->order_id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Periodo (meses)</th>
                                        <td>{{$did->did_period}}</td>
                                    </tr>
                                    <tr>
                                        <th>Renovación</th>
                                        <td>
                                            @if($did->autorenew_enable === 0)
                                                Inactivo
                                            @else
                                                Activo
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-body no-padding">
                                Su número virtual ha sido correctamente asignado, de click en el siguiente vínculo para
                                configurar su Virtual IVR
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {!! Html::link('phones/create', 'Siguiente', array('class' => 'btn btn-flat btn-primary pull-right')) !!}
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

    <script>
        $(document).ready(function () {
            $('form').submit(function (e) {
                e.preventDefault();
                url = $(this).parent().attr('action');
                BootstrapDialog.confirm('Are you sure you want to delete?', function (result) {
                    if (result) {
                        $.ajax(url);
                    }
                });
            });

        });

    </script>

@endsection