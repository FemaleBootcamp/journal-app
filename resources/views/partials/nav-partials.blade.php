
<nav class="navbar fixed-top navbar-default" style="background-color:#32CD99">
    <div>
        <img alt="logo" class="img-fluid" src="{{ asset('img/Logo.png') }}" style="width: 50px;height:50px">
    </div>




    <div class="col-xs-5" style="margin-top: 25px; margin-right: 10px;">
        @if(!isset($user))
    <div class="col-xs-5" style=" margin-right: 10px;">
        <ul class="list-inline">
            <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
            <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
        </ul>
        @else
            {{ $user -> name }}
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
    </div>

    @endif

    </div>
</nav>



