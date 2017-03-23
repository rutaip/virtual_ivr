@extends('layouts.main')

@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Endpoints</h3>

                        <div class="box-tools no-margin pull-right">
                            {!! Html::link('endpoints/create', 'Crear Endpoint', array('class' => 'btn btn-sm btn-success btn-flat pull-left')) !!}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table">
                            <tr>
                                <th>Extensión</th>
                                <th>Password</th>
                                <th>Contexto</th>
                                <th>Transporte</th>
                                <th>Codecs</th>
                                <th>Opciones</th>
                            </tr>

                            @foreach($endpoints as $endpoint)
                                <tr>
                                    <td>{{$endpoint->id}}</td>
                                    <td>{{$endpoint->ps_auth->password}}</td>
                                    <td>{{$endpoint->context}}</td>
                                    <td>{{$endpoint->transport}}</td>
                                    <td>{{$endpoint->allow}}</td>
                                    <td class="btn-toolbar">
                                        {!! Html::link('endpoints/'.$endpoint->id.'/edit', 'Editar', array('class' => 'btn btn-sm btn-primary btn-flat pull-left')) !!}
                                        {!! Form::model($endpoint, ['method' => 'DELETE', 'url' => 'endpoints/' . $endpoint->id], array('class' => 'btn-toolbar')) !!}
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
                            {{ $endpoints->links() }}
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