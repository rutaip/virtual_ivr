<!-- /.col -->
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Virtual IVR Wizard</h3>
                <div class="box-tools no-margin pull-right"></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box-body">
                            <!-- form start -->
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Paquete Seleccionado</h4>
                                    <ul>
                                        <li>$ @{{ combo }}</li>
                                    </ul>
                                    <h4>Extensiones creadas</h4>
                                    <ul>
                                        <li>Telefono 1: @{{ Phone_1 }}</li>
                                        <li>Telefono 2: @{{ Phone_2 }}</li>
                                        <li>Telefono 3: @{{ Phone_3 }}</li>
                                    </ul>
                                    <h4>Audios</h4>
                                    <ul>
                                        <li>@{{ bienvenida }}</li>
                                        <li>@{{ horario }}</li>
                                        <li>@{{ despedida }}</li>
                                    </ul>
                                    <h4>DID</h4>
                                    <ul>
                                        <li>Número: @{{ DID }}</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>

                        <div class="box-footer">

                        </div>

                    </div>
                    <div class="col-md-6">
                        <h3>Resumen y forma de pago</h3>

                        Antes de finalizar revise su pedido en el resumen del lado izquierdo.
                        Seleccione su método de pago


                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="btn-toolbar">

                    {!! Form::submit('Confirmar', ['class' => 'btn  btn-flat btn-primary pull-right']) !!}

                    <a href="#" class="btn btn-flat btn-primary pull-right" onclick="dids()">Anterior</a>
                </div>
            </div>
            <!-- /.box-footer -->
        </div>
    </div>
</div>