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
                        <h3 class="box-title">Nueva Extensión</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::model($phone, ['method' => 'PATCH', 'url' => 'phones/' . $phone->id]) !!}

                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('phone', 'Teléfono') !!}
                            <p class="help-block">Ingrese su número telefonico (10 Digitos para México)</p>
                            {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => '5514253647', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('label', 'Etiqueta') !!}
                            {!! Form::text('label', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'casa, oficina, celular']) !!}
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        {!! Form::submit('Editar extensión', ['class' => 'btn  btn-flat btn-primary']) !!}
                        {{Html::link('phones', 'Cancelar', array('class' => 'btn btn-flat btn-danger'))}}

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