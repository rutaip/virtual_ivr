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
                                <th>País</th>
                                <th>Ciudad</th>
                                <th>Prefijo</th>
                                <th style="width: 10%" >Meses</th>
                                <th>Opciones</th>
                            </tr>
                            @foreach($cities as $city)
                                <tr>
                                    {!! Form::open(array('url' => 'dids', 'role' => 'form')) !!}
                                    <td>{{$city->country_name}}</td>
                                    <td>{{$city->city_name}}</td>
                                    <td>{{$city->city_prefix}}</td>
                                    <td class="form-group">
                                        {!! Form::text('period', '1', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'meses', 'autofocus']) !!}
                                    </td>
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