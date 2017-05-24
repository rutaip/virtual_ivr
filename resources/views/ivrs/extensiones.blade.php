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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('phone_1', 'Teléfono 1') !!}
                                        <p class="help-block">Número a 10 digitos</p>
                                        {!! Form::text('phone_1', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => '5514253647', 'autofocus', 'v-model' => 'Phone_1', '@change' => 'phone_1']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('phone_2', 'Teléfono 2') !!}
                                        <p class="help-block">Número a 10 digitos</p>
                                        {!! Form::text('phone_2', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => '5514253647', 'v-model' => 'Phone_2', '@change' => 'phone_2']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('phone_3', 'Teléfono 3') !!}
                                        <p class="help-block">Número a 10 digitos</p>
                                        {!! Form::text('phone_3', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => '5514253647', 'v-model' => 'Phone_3', '@change' => 'phone_3']) !!}
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>

                        <div class="box-footer">

                        </div>

                    </div>
                    <div class="col-md-6">

                        Está a unos pasos de la creación de su Virtual IVR!

                        Antes de iniciar valide que tiene saldo suficiente en su cuenta para crear un
                        Virtual
                        IVR
                        <br><br>
                        Pasos:
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
                <div class="btn-toolbar">
                    <a href="#" class="btn btn-flat btn-primary pull-right" onclick="audios()">Siguiente</a>
                    <a href="#" class="btn btn-flat btn-primary pull-right" onclick="paquetes()">Anterior</a>
                </div>
            </div>
            <!-- /.box-footer -->
        </div>
    </div>
</div>