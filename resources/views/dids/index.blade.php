@extends('layouts.main')

@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">DIDs</h3>

                        <div class="box-tools no-margin pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tr>
                                <th>Número</th>
                                <th>Estatus</th>
                                <th>País</th>
                                <th>Ciudad</th>
                                <th>Prefijo</th>
                                <th>Auto Renovación</th>
                                <th>Opciones</th>
                            </tr>
                            @foreach($dids as $did)
                                <tr>
                                    <td>{{$did->did_number}}</td>
                                    <td>{{$did->did_status}}</td>
                                    <td>{{$did->country_name}}</td>
                                    <td>{{$did->city_name}}</td>
                                    <td>{{$did->city_prefix}}</td>
                                    <td>
                                        @if($did->autorenew_enable === 0)
                                            Inactivo
                                        @else
                                            Activo
                                        @endif
                                    </td>
                                    <td class="btn-toolbar">
                                        {!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger btn-flat pull-left']) !!}
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