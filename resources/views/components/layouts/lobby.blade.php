<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/logo2.png') }}" type="image/x-icon">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img class="lobby-logo" src="{{ asset('img/logo2.png') }}" alt="">
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                {{ $slot }}
            </div>
        </div>
    </div>

    <footer class="main-footer text-center">
        <strong>Copyright &copy; 2021 - <a href="#">UIN Syarif Hidayatullah Jakarta</a></strong>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
</body>

</html>