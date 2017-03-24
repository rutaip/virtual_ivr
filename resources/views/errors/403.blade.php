@extends('layouts.main')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="error-page">
        <h2 class="headline text-yellow"> 403</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! No tiene permisos para este sitio</h3>

            <p>
                La página solicitada no existe o no tiene permisos sobre ella.
                Mientras tanto, {!! Html::link('dashboard', 'regrese a su panel de control') !!} o seleccione una opciópn diferente.
            </p>

        </div>
        <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection