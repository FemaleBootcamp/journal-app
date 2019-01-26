<!DOCTYPE html>

<html lang="en">

<head>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/Logo.png') }}" />
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Motus</title>
</head>

<body>
    <div id="app">
        @include('partials.nav-partials')
        <div id="footer" class="container">
            <br><br><br>
            <div class="row text-center text-white text-xs-center text-sm-left text-md-left mt-5">
                <div class="col-xs-10 offset-5">
                    <h4 class="mb-4"><span><strong>Meet The Team</strong></span></h4>
                    <hr>
                    <ul class="list-unstyled quick-links">
                        <li><a target="_blank" href="https://www.linkedin.com/in/nikola-gjorgjievski/"><span><i
                                        class="fa fa-linkedin"></span></i>Project Manager: <span><strong>Nikola
                                        Gjorgjievski</strong></span></a></li>
                        <li><a target="_blank" href="https://www.linkedin.com/in/stankovskatamara/"><span><i
                                        class="fa fa-linkedin"></span></i>Team
                                Member: <span><strong>Tamara
                                        Stankovska</strong></span></a>
                        </li>
                        <li><a target="_blank" href="https://www.linkedin.com/in/ketimitrovska/"><span><i
                                        class="fa fa-linkedin"></span></i>Team
                                Member: <span><strong>Keti
                                        Mitrovska</strong></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="fixed-bottom">
            @include('partials.footer-partials')
        </div>
    </div>

    <script src="js/app.js?v={{ env('ASSETS_VERSION', 2) }}"></script>


</body>

</html>