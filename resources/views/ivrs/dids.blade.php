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
                                        {!! Form::open(array('url' => 'dids', 'role' => 'form')) !!}
                                        <td>{{$city->country_name}}</td>
                                        <td>{{$city->city_name}}</td>
                                        <td>{{$city->city_prefix}}</td>
                                        <td class="btn-toolbar">
                                            {!! Form::hidden('iso', $city->country_iso) !!}
                                            {!! Form::hidden('city_prefix', $city->city_prefix) !!}
                                            {!! Form::hidden('city_id', $city->city_id) !!}
                                            {!! Form::submit('Seleccionar', ['class' => 'btn btn-sm btn-flat pull-left']) !!}
                                        </td>
                                        {!! Form::close() !!}
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <li><a href="#">&laquo;</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">&raquo;</a></li>
                            </ul>
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
            </div>
            <!-- /.box-footer -->
        </div>
    </div>
</div>