
<!DOCTYPE html>

<html lang="en">

<head>

    <link rel="stylesheet" type="text/css" href="css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>

<body>
    <div id="app">
        @include('partials.nav-partials')
        @yield('content')
        @include('partials.footer-partials')
    </div>

    <script src="js/app.js?v={{ env('ASSETS_VERSION', 2) }}"></script>


</body>

</html>