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
                                        {!! Form::label('bienvenida', 'Audio Bienvenida') !!}
                                        <p class="help-block">Seleccione un audio desde su equipo</p>
                                        <input type="file" name="bienvenida" id="bienvenida" accept="audio/*" @change="audio_1">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('horario', 'Horario de atención') !!}
                                        <p class="help-block">Seleccione un audio desde su equipo</p>
                                        <input type="file" name="horario" id="horario" accept="audio/*" @change="audio_2">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('despedida', 'Audio Despedida') !!}
                                        <p class="help-block">Seleccione un audio desde su equipo</p>
                                        <input type="file" name="despedida" id="despedida" accept="audio/*" @change="audio_3">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>

                        <div class="box-footer">

                        </div>

                    </div>
                    <div class="col-md-6">

                        En esta sección deberá cargar al portal los audios en formato mp3
                        <br>
                        <br>
                        De acuerdo a su audio de bienvenida deberá contemplar los siguiente audios:
                        <br><br>

                        <ul class="treeview-menu">
                            <li>Audio de bienvenida (Gracias, por llamarnos. Para ventas presione 1, etc.)</li>
                            <li>Horario de Atención (Nuestro horario de atención es de ...)</li>
                        </ul>

                        Una vez seleccionada su opción continue con el boton siguiente:
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="btn-toolbar">
                    <a href="#" class="btn btn-flat btn-primary pull-right" onclick="menu()">Siguiente</a>
                    <a href="#" class="btn btn-flat btn-primary pull-right" onclick="extensiones()">Anterior</a>
                </div>
            </div>
            <!-- /.box-footer -->
        </div>
    </div>
</div>