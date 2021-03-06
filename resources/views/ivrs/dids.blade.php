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
                        <div class="box-body no-padding">
                            <table class="table">
                                <tr>
                                    <th>País</th>
                                    <th>Ciudad</th>
                                    <th>Prefijo</th>
                                    <th>Opciones</th>
                                </tr>
                                @foreach($cities as $city)
                                    <tr>
                                        <td>{{$city->country_name}}</td>
                                        <td>{{$city->city_name}}</td>
                                        <td>{{$city->city_prefix}}</td>
                                        <td class="btn-toolbar">
                                            {{ Form::radio('did', $city->city_prefix . '-' . $city->city_name, null, ['v-model' => 'DID']) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                        </div>
                        <!-- /.box-footer -->

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
                    <a href="#" class="btn btn-flat btn-primary pull-right" onclick="resumen()">Siguiente</a>
                    <a href="#" class="btn btn-flat btn-primary pull-right" onclick="menu()">Anterior</a>
                </div>

            </div>
            <!-- /.box-footer -->
        </div>
    </div>
</div>