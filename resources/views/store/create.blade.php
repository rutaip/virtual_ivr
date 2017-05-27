@extends('layouts.main')

@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <form action="{{url('mercado?topic=payment&id=2756346633')}}" method="post">
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
                                    <!-- form start -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('id', 'ID') !!}
                                                <p class="help-block">Elija la duración de su plan (meses)</p>
                                                {!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Id']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('topic', 'Topic') !!}
                                                <p class="help-block">Elija su método de pago</p>
                                                {!! Form::text('topic', null, ['class' => 'form-control', 'placeholder' => 'Topic']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>

                                    <div class="row">
                                        <div class="col-md-12" style="text-align: center">
                                            <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppppcmcvdam.png">
                                            <br><br>
                                            <img src="https://imgmp.mlstatic.com/org-img/banners/mx/medios/MLM_468X60_new.jpg" width="468" height="60"/>
                                        </div>

                                    </div>
                                    <!-- /.box-body -->
                                </div>

                            </div>
                            <div class="col-md-6">

                                <h4>Cómo deseas realizar tu pago?</h4>

                                Para tu seguridad y confianza la comunicación del sitio está encriptada mediante certificados ssl (https).
                                <br>
                                <br>
                                <div style="text-align: center">
                                    {{Html::image('images/https.png')}}
                                </div>

                                <br>
                                <ul class="treeview-menu fa-ul">
                                    <li><i class="fa-li fa fa-check-square"></i>Para crear o activar su IVR deberá contar con saldo suficiente de acuerdo al ivr contratado</li>
                                    <li><i class="fa-li fa fa-check-square"></i>Su IVR se renovará automaticamente de manera mensual</li>
                                    <li><i class="fa-li fa fa-check-square"></i>Su crédito expira un año después de su última compra</li>
                                    <li><i class="fa-li fa fa-check-square"></i>Nuestros métodos de pago son seguros</li>
                                    <li><i class="fa-li fa fa-check-square"></i>Elegimos los mejores proveedores de pago para garantizar su seguridad</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {!! Form::submit('Realizar pago', ['class' => 'btn  btn-flat btn-primary pull-right']) !!}
                    </div>
                    <!-- /.box-footer -->
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.box -->
        <!-- /.col -->
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection