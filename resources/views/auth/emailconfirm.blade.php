@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Confirmación</div>
                <div class="panel-body">

                    Su correo fue verificado. Click aquí para iniciar sesión <a href={{url('login')}}>Ingresar</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
