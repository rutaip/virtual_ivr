@extends('layouts.main')

@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Roles</h3>

                        <div class="box-tools no-margin pull-right">
                            {!! Html::link('roles/create', 'Crear Rol', array('class' => 'btn btn-sm btn-success btn-flat pull-left')) !!}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tr>
                                <th>Nombre</th>
                                <th>Etiqueta</th>
                                <th>Descipción</th>
                                <th>Opciones</th>
                            </tr>

                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->label}}</td>
                                    <td>{{$role->description}}</td>
                                    <td class="btn-toolbar">
                                        {!! Html::link('roles/'.$role->id.'/edit', 'Editar', array('class' => 'btn btn-sm btn-primary btn-flat pull-left')) !!}
                                        {!! Html::link('roles/'.$role->id.'/permissions', 'Permisos', array('class' => 'btn btn-sm btn-success btn-flat pull-left')) !!}
                                        {!! Form::model($role, ['method' => 'DELETE', 'url' => 'roles/' . $role->id], array('class' => 'btn-toolbar')) !!}
                                        {!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger btn-flat pull-left']) !!}
                                        {!! Form::close() !!}
                                    </td>
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
                <!-- /.box -->
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>

    </section>
    <!-- /.content -->

    <script>
        $(document).ready(function(){
            $('form').submit(function(e){
                e.preventDefault();
                url = $(this).parent().attr('action');
                BootstrapDialog.confirm('Are you sure you want to delete?', function(result){
                    if(result) {
                        $.ajax(url);
                    }
                });
            });

        });

    </script>

@endsection