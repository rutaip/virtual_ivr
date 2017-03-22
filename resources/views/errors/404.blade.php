@extends('layouts.main')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Página no encontrada</h3>

            <p>
                La pàgina solicitada no existe.
                Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
            </p>

            <form class="search-form">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">

                    <div class="input-group-btn">
                        <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- /.input-group -->
            </form>
        </div>
        <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection