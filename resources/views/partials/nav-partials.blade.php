
<nav class="navbar navbar-default" style="margin-bottom: 0;">
    <div class="col-xs-2" style="padding: 10px;">
        <img alt="logo" class="img-fluid" src="{{ asset('img/Journal-app.png') }}" style="width: 150px;">
    </div>



    <div class="col-xs-5" style="margin-top: 25px; margin-right: 10px;">
        @if(Auth::guest())
        <ul class="list-inline">
            <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
            <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
        </ul>
        @else
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
    @endif
    </div>


</nav>



