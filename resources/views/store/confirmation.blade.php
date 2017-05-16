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
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">


                                Pago exitoso
                                <br><br>
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
        <!-- /.box -->
        <!-- /.col -->
        <!-- /.row -->
    </section>
    <!-- /.content -->

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

@endsection