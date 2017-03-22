@extends('layouts.main')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="error-page">
        <h2 class="headline text-yellow"> 403</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! No tiene permisos para este sitio</h3>

            <p>
                La pàgina solicitada no existe.
                Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
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