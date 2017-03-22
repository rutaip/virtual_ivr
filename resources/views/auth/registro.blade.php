@extends('layouts.access')

@section('content')

    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html"><b>Fast</b>code</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Crear una nueva cuenta</p>

            <!-- form start -->
            {!! Form::open(array('url' => 'register', 'role' => 'form')) !!}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                    <input type="text" id="name" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}" autofocus>
                    @if ($errors->has('name'))
                        <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                    @endif
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }} has-feedback">
                    <input type="text" id="lastname" class="form-control" placeholder="Apellido" name="lastname" value="{{ old('lastname') }}">
                    @if ($errors->has('lastname'))
                        <span class="help-block">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                    @endif
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <input type="email" id="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                    @endif
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                    <input type="password" id="password" class="form-control" placeholder="Contraseña" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                    @endif
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
                    <input type="password" id="password-confirm" class="form-control" placeholder="Confirmar contraseña" name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                    @endif
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Estoy de acuerdo con los <a href="#">términos</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarse</button>
                    </div>
                    <!-- /.col -->
                </div>
            {!! Form::close() !!}

            <a href="login.html" class="text-center">Ya tengo una cuenta</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->


@endsection