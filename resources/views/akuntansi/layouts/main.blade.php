<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />

    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
    <script src="{{ asset('js/all.min.js') }}" crossorigin="anonymous"></script>
    @yield('custom-style')
</head>
<body class="sb-nav-fixed">
    @include('akuntansi.layouts.navbar')
    <div id="layoutSidenav">
        @include('akuntansi.layouts.sidebar')
        <div id="layoutSidenav_content">
            @yield('main')
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Wahidin 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.5.1.slim.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/datatables-demo.js') }}"></script>
    @stack('tooltip')
</body>
</html>
