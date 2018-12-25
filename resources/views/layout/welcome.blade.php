
<!DOCTYPE html>

<html lang="en">

<head>


 <link rel="stylesheet" type="text/css" href="css/app.css">


 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
 <style>
        body {
            background-color: #7AE0BE;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
        }
        
        #logo {
            margin: auto;
            width: 100%;
        }
        
        #text {
            color: white;
            text-align: center;
        }
        
        span {
            color: #CD3266
        }
        
        .btn-info:hover {
            background-color: #32CD99;
            border-color: #CD3266;
        }
        
        .btn-info {
            background-color: #CD3266;
            border-color: #32CD99;
        }
        
        #qs {
            color: white;
           }
        
        ul {
            color: #CD3266;
            list-style-type: none;
        }
        #people{
            width:50%;
        }
        </style>

</head>

<body>


@include('partials.nav-partials')
@include('layout.header')

@yield('content')
@include('partials.footer-partials')
@include('partials.footer-fontscripts')

 </body>

</html>