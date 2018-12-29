
<nav class="navbar navbar-default" style="margin-bottom: 0;">
    <div class="col-xs-2" style="padding: 10px;">
        <img alt="logo" class="img-fluid" src="{{ asset('img/Journal-app.png') }}" style="width: 150px;">
    </div>


    <div class="col-xs-5" style="margin-top: 25px; margin-right: 10px;">
        <ul class="list-inline">
            <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
            <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
        </ul>
    </div>
</nav>



