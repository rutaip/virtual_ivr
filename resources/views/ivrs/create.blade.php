@extends('layouts.main')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#paquetes" aria-controls="paquetes" role="tab" data-toggle="tab">Paquete</a></li>
                <li role="presentation"><a href="#extensiones" aria-controls="extensiones" role="tab" data-toggle="tab">Extensiones</a></li>
                <li role="presentation"><a href="#audios" aria-controls="audios" role="tab" data-toggle="tab">Audios</a></li>
                <li role="presentation"><a href="#menu" aria-controls="menu" role="tab" data-toggle="tab">Menú</a></li>
                <li role="presentation"><a href="#dids" aria-controls="dids" role="tab" data-toggle="tab">Número DID</a></li>
                <li role="presentation"><a href="#resumen" aria-controls="resumen" role="tab" data-toggle="tab">Resumen</a></li>

            </ul>

        </div>
        <div class="tab-content">

            <div role="tabpanel" class="tab-pane active" id="paquetes">
                {!! Form::open(array('url' => 'phones', 'role' => 'form')) !!}

                @include('ivrs.combo')
            </div>
            <div role="tabpanel" class="tab-pane" id="extensiones">
                @include('ivrs.extensiones')
            </div>
            <div role="tabpanel" class="tab-pane" id="audios">
                @include('ivrs.audios')
            </div>
            <div role="tabpanel" class="tab-pane" id="dids">
                @include('ivrs.dids')
            </div>
            <div role="tabpanel" class="tab-pane" id="menu">
                @include('ivrs.menu')
            </div>
            <div role="tabpanel" class="tab-pane" id="resumen">
                @include('ivrs.resumen')
                {!! Form::close() !!}
            </div>
        </div>

        <!-- /.col -->
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <script>
        function paquetes() {
            $('[href="#paquetes"]').tab('show');
        }
        function extensiones() {
            $('[href="#extensiones"]').tab('show');
        }
        function audios() {
            $('[href="#audios"]').tab('show');
        }
        function dids() {
            $('[href="#dids"]').tab('show');
        }
        function resumen() {
            $('[href="#resumen"]').tab('show');
        }
        function menu() {
            $('[href="#menu"]').tab('show');
        }

    </script>


@endsection