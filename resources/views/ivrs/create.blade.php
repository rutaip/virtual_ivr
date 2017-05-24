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
        {!! Form::open(array('url' => 'ivrs', 'role' => 'form')) !!}


        <div class="tab-content" id="ivr_create">

            <div role="tabpanel" class="tab-pane active" id="paquetes">

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

            </div>

        </div>

    {!! Form::close() !!}

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


        new Vue({

            el: '#ivr_create',

            data: {
                Phone_1 : '',
                Phone_2 : '',
                Phone_3 : '',
                Label_1 : '',
                Label_2 : '',
                Label_3 : '',
                DID : '',
                combo : '',
                bienvenida : '',
                horario : '',
                despedida : '',
                options: [
                ]

            },
            methods : {
                audio_1(e) {
                    var files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                    return; this.bienvenida = files[0].name;
                },
                audio_2(e) {
                    var files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                        return; this.horario = files[0].name;
                },
                audio_3(e) {
                    var files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                        return; this.despedida = files[0].name;
                },
                phone_1(){
                    this.options.push({text : 'Telefono 1', value: this.Phone_1});

                },
                phone_2(){
                    this.options.push({text : 'Telefono 2', value: this.Phone_2});

                },
                phone_3(){
                    this.options.push({text : 'Telefono 3', value: this.Phone_3});

                }
            }
        });


    </script>


@endsection