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
                                    <div class="form-group">
                                        {!! Form::label('option_1', 'Menú opción 1') !!}
                                        <p class="help-block">Esta opción en el menú transferirá a: </p>
                                        <select class="form-control" name="option_1">
                                            <option v-for="option in options" v-bind:value="option.value">
                                                @{{ option.text }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('option_2', 'Menú opción 2') !!}
                                        <p class="help-block">Esta opción en el menú transferirá a: </p>
                                        <select class="form-control" name="option_2">
                                            <option v-for="option in options" v-bind:value="option.value">
                                                @{{ option.text }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('option_3', 'Menú opción 3') !!}
                                        <p class="help-block">Esta opción en el menú transferirá a: </p>
                                        <select class="form-control" name="option_3">
                                            <option v-for="option in options" v-bind:value="option.value">
                                                @{{ option.text }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('option_4', 'Menú opción 4') !!}
                                        <p class="help-block">Esta opción en el menú transferirá a: </p>
                                        <select class="form-control" name="option_4">
                                            <option v-for="option in options" v-bind:value="option.value">
                                                @{{ option.text }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('option_5', 'Menú opción 5') !!}
                                        <p class="help-block">Esta opción en el menú transferirá a: </p>
                                        <select class="form-control" name="option_5">
                                            <option v-for="option in options" v-bind:value="option.value">
                                                @{{ option.text }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>

                        <div class="box-footer">

                        </div>

                    </div>
                    <div class="col-md-6">

                        En esta sección deberá configurar su menú relacionando las opciones de su menú de Bienvenida con
                        las extensiones que configuró en el paso de extensiones
                        <br>
                        <br>
                        Una vez seleccionada su opción continue con el boton siguiente:
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="btn-toolbar">
                    <a href="#" class="btn btn-flat btn-primary pull-right" onclick="dids()">Siguiente</a>
                    <a href="#" class="btn btn-flat btn-primary pull-right" onclick="audios()">Anterior</a>
                </div>
            </div>
            <!-- /.box-footer -->
        </div>
    </div>
</div>