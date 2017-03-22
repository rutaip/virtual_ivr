@extends('layouts.main')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Permisos del rol {{$role->label}}</h3>
                        <div class="col-md-4 pull-right">

                            {!! Form::open(array('url' => 'roles/role_permissions')) !!}
                            <div class="col-md-6">
                                {{ Form::select('permission', $permissions, null, ['class' => 'form-control']) }}
                                {{ Form::hidden('role_id', $role->id) }}
                            </div>
                            <div class="col-md-6">
                                {!! Form::submit('Asignar', ['class' => 'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}


                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Etiqueta</th>
                                <th>Descripción</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($role->permissions as $permission)
                                <tr>
                                    <td>{{$permission->id}}</td>
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->label}}</td>
                                    <td>{{$permission->description}}</td>
                                    <td>
                                        {!! Form::open(array('url' => 'roles/role_permissions_delete')) !!}

                                        {{ Form::hidden('role_id', $role->id) }}
                                        {{ Form::hidden('permission_id', $permission->id) }}

                                        {!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger btn-flat pull-left']) !!}

                                        {!! Form::close() !!}

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection