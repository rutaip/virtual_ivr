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
                        <!--Paquete 1 -->
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3>$490 mxn</h3>

                                        <p>+ iva (mensual)</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-cart-plus"></i>
                                    </div>
                                    <div class="small-box-footer">
                                        <a href='#' onclick="document.getElementById('r1').checked = ! document.getElementById('r1').checked;" style="color:white">Quiero este
                                            paquete! <i class="fa fa-arrow-circle-right"></i></a>
                                        | <a href="#" style="color:white" data-toggle="modal"
                                             data-target="#myModal1">Más información <i
                                                    class="fa fa-question-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Paquete 2 -->
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>$950 mxn</h3>

                                        <p>+ iva (mensual)</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-cart-plus"></i>
                                    </div>
                                    <div class="small-box-footer">
                                        <a href='#' onclick="document.getElementById('r3').checked = ! document.getElementById('r3').checked;" style="color:white">Quiero este
                                            paquete! <i class="fa fa-arrow-circle-right"></i></a>
                                        | <a href="#" style="color:white" data-toggle="modal"
                                             data-target="#myModal3">Más información <i
                                                    class="fa fa-question-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Paquete 3 -->
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>$750 mxn</h3>

                                        <p>+ iva (mensual)</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-cart-plus"></i>
                                    </div>
                                    <div class="small-box-footer">
                                        <a href='#' onclick="document.getElementById('r2').checked = ! document.getElementById('r2').checked;" style="color:white">Quiero este
                                            paquete! <i class="fa fa-arrow-circle-right"></i></a>
                                        | <a href="#" style="color:white" data-toggle="modal"
                                             data-target="#myModal2">Más información <i
                                                    class="fa fa-question-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        Está a unos pasos de la creación de su Virtual IVR!

                        Este formulario le guiará para configurar su Virtual IVR

                        <br><br>
                        El primer paso es seleccionar el paquete de acuerdo a la información que encontrará en el panel izquierdo:
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">

                                <table class="table table-bordered" width="50%">
                                    <tr>
                                        <th>Paquete 1</th>
                                        <th>Paquete 2</th>
                                        <th>Paquete 3</th>
                                    </tr>
                                    <tr>

                                        <th>{!! Form::radio('combo', '1', null, ['required' => 'required', 'id' => 'r1']) !!}
                                            $490
                                        </th>
                                        <th>{!! Form::radio('combo', '2', null, ['required' => 'required', 'id' => 'r2']) !!}
                                            $750
                                        </th>
                                        <th>{!! Form::radio('combo', '3', true, ['required' => 'required', 'id' => 'r3']) !!}
                                            $950
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <br>
                        Una vez seleccionado su paquete de click en el botón siguiente:
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="pull-right">
                    <button class="btn btn-flat btn-primary" onclick="extensiones()">Siguiente</button>
                </div>
            </div>
            <!-- /.box-footer -->
        </div>
    </div>
</div>


<!-- Modal paquete 1-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Paquete $490 mxn + iva</h3>
            </div>
            <div class="modal-body">
                <ul class="treeview-menu">
                    <li>500 minutos al mes para llamadas transferidas-enrutadas</li>
                    <li>Número local para recibir llamadas (atiende 2 llamadas de manera simultanea)</li>
                    <li>3 extensiones enrutadas (casa, oficina, celular)</li>
                    <li>Mensaje de bienvenida con menú de opciones (Hasta 5 opciones y 1 nivel de menú)</li>
                    <li>Grupo de timbrado. (Timbrará en una o más extensiones a la vez)</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal paquete 2-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Paquete $950 mxn + iva</h3>
            </div>
            <div class="modal-body">
                <ul class="treeview-menu">
                    <li>500 minutos al mes para llamadas transferidas-enrutadas</li>
                    <li>Número local para recibir llamadas (atiende 2 llamadas de manera simultanea)</li>
                    <li>3 extensiones enrutadas (casa, oficina, celular)</li>
                    <li>Mensaje de bienvenida con menú de opciones (Hasta 5 opciones y 1 nivel de menú)</li>
                    <li>Grupo de timbrado. (Timbrará en una o más extensiones a la vez)</li>
                    <li>Buzón de voz vía email</li>
                    <li>Control de horario para enrutamiento de llamadas</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal paquete 3-->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">Paquete $750 mxn + iva</h3>
            </div>
            <div class="modal-body">
                <ul class="treeview-menu">
                    <li>500 minutos al mes para llamadas transferidas-enrutadas</li>
                    <li>Número local para recibir llamadas (atiende 2 llamadas de manera simultanea)</li>
                    <li>3 extensiones enrutadas (casa, oficina, celular)</li>
                    <li>Mensaje de bienvenida con menú de opciones (Hasta 5 opciones y 1 nivel de menú)</li>
                    <li>Grupo de timbrado. (Timbrará en una o más extensiones a la vez)</li>
                    <li>Buzón de voz vía email</li>
                    <li>Control de horario para enrutamiento de llamadas</li>
                    <li>Click2dial</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
