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
                        <h3 class="box-title">Nuevo Rol</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::open(array('url' => 'roles', 'role' => 'form')) !!}
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('name', 'Nombre') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nombre del rol', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('label', 'Etiqueta') !!}
                            {!! Form::text('label', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Etiqueta para el sitio ej.(Edición de módulo)']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Descripción') !!}
                            {!! Form::text('description', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Descripción del rol']) !!}
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        {!! Form::submit('Crear rol', ['class' => 'btn btn-flat btn-primary']) !!}
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