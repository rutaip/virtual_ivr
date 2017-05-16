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
                            {!! Form::open(array('url' => 'phones', 'role' => 'form')) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('phone', 'Teléfono 1') !!}
                                        <p class="help-block">Número a 10 digitos</p>
                                        {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => '5514253647', 'autofocus']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('label', 'Etiqueta Telefono 1') !!}
                                        <p class="help-block">Identificador del teléfono</p>
                                        {!! Form::text('label', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'casa, oficina, celular']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('phone', 'Teléfono 2') !!}
                                        <p class="help-block">Número a 10 digitos</p>
                                        {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => '5514253647', 'autofocus']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('label', 'Etiqueta Telefono 2') !!}
                                        <p class="help-block">Identificador del teléfono</p>
                                        {!! Form::text('label', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'casa, oficina, celular']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('phone', 'Teléfono 3') !!}
                                        <p class="help-block">Número a 10 digitos</p>
                                        {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => '5514253647', 'autofocus']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('label', 'Etiqueta Telefono 3') !!}
                                        <p class="help-block">Identificador del teléfono</p>
                                        {!! Form::text('label', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'casa, oficina, celular']) !!}
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>

                        <div class="box-footer">
                            {!! Form::submit('Crear extensión', ['class' => 'btn btn-flat btn-primary']) !!}
                            {{Html::link('phones', 'Cancelar', array('class' => 'btn btn-flat btn-danger'))}}

                        </div>
                        {!! Form::close() !!}
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
            </div>
            <!-- /.box-footer -->
        </div>
    </div>
</div>