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

<body class="hold-transition text-sm {{ $customClass ?? '' }}">
    <div id="app">
        @yield('content')
    </div>
    <!-- CMS SCRIPTS -->
    <script src="{{ mix('assets/js/cms.js') }}?_h={{ time() }}"></script>

    <!-- AdminLTE -->
    <script defer src="/assets/cms/js/adminlte.min.js?_h={{ time() }}"></script>

    @yield('scripts')
    </body>
</html>
