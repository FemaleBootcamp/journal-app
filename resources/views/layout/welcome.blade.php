
<!DOCTYPE html>

<html lang="en">

<head>


 <link rel="stylesheet" type="text/css" href="css/app.css">


 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

</head>

<body>


@include('partials.nav-partials')
@include('layout.header')

@yield('content')
@include('partials.footer-partials')
@include('partials.footer-fontscripts')

 </body>

</html>