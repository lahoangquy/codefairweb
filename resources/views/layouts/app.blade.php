<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>IT Code Fair | CMS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/cms/css/adminlte.min.css?_h={{ time() }}">
    @yield('head')
</head>

<body class="hold-transition sidebar-mini text-sm">
<div class="wrapper" id="app">
    @if (auth()->check())
    {!! view('cms.partials.nav') !!}

    <!-- Main Sidebar Container -->
    {!! view('cms.partials.sidebar') !!}
    @endif

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper py-4">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            @yield('page_header')
                        </h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            @yield('content')
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2021 <a href="#">IT Code Fair</a>.</strong>
        All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- CMS SCRIPTS -->
<script src="{{ mix('assets/js/cms.js') }}?_h={{ time() }}"></script>

<!-- AdminLTE -->
<script defer src="/assets/cms/js/adminlte.min.js?_h={{ time() }}"></script>
<script>
    $('a[data-toggle="tooltip"]').tooltip()
</script>

@yield('scripts')
</body>
</html>
