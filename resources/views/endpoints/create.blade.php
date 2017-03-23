@extends('layouts.main')

@section('content')
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                @include('errors.error')

                <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nuevo Endpoint</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="row box-body">
                            {!! Form::open(array('url' => 'endpoints', 'role' => 'form')) !!}

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('id', 'Endpoint') !!}
                                    <p class="help-block">Ingrese el número de extensión</p>
                                    {!! Form::text('id', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => '6001', 'autofocus']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('transport', 'Transporte') !!}
                                    <p class="help-block">Tipo de transporte para endpoint (transport-udp por defecto)</p>
                                    {!! Form::select('transport', ['transport-udp' => 'transport-udp','tls' => 'tls'], null, ['class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('context', 'Contexto') !!}
                                    <p class="help-block">Contexto para el endpoint</p>
                                    {!! Form::select('context', ['users' => 'users', 'ivr' => 'ivr', 'guest' => 'guest'], null, ['class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('allow', 'Codecs') !!}
                                    <p class="help-block">Seleccione los codecs permitidos para el endpoint, opus para WebRTC</p>
                                    {!! Form::select('allow[]', ['g729' => 'g729','alaw' => 'alaw','ulaw' => 'ulaw', 'gsm' => 'gsm','opus' => 'opus'], ['alaw', 'ulaw'], ['multiple', 'class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('password', 'Endpoint Password') !!}
                                    <p class="help-block">Contraseña para el endpoint</p>
                                    {!! Form::text('password', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                </div>

                            </div>

                        </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <div class="btn-group pull-right">
                                {!! Form::submit('Crear extensión', ['class' => 'btn btn-flat btn-primary']) !!}
                                {{Html::link('endpoints', 'Cancelar', array('class' => 'btn btn-flat btn-danger'))}}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->

@endsection