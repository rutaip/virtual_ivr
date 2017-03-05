<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fastcode Virtual IVR</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    {!! Html::style('css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    {!! Html::style('css/font-awesome.min.css') !!}
    <!-- Ionicons -->
    {!! Html::style('css/ionicons.min.css') !!}
    <!-- Theme style -->
    {!! Html::style('css/AdminLTE.min.css') !!}
    <!-- iCheck -->
    {!! Html::style('css/blue.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition register-page">

@yield('content')


<!-- jQuery 2.2.3 -->
{!! Html::script('js/jquery-2.2.3.min.js') !!}

<!-- Bootstrap 3.3.6 -->
{!! Html::script('js/bootstrap.min.js') !!}
<!-- iCheck -->
{!! Html::script('js/icheck.min.js') !!}
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>