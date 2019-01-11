
<nav class="navbar fixed-top navbar-default" style="background-color:#32CD99">
    <div class="col-xs-6">
        <img alt="logo" class="img-fluid" src="{{ asset('img/Logo.png') }}" style="width: 50px;height:45px">
    </div>

    <div class="col-xs-6" style=" margin-right: 10px;">
        @if(!isset($user))
            <div>
                <ul class="inline" style="display:inline;">
                    <li class="list-inline-item"><button class="btn btn-info btn-lg"><a style="text-decoration:none" class="text-white" href="{{ route('register') }}">Register</a></button></li>
                    <li class="list-inline-item"><button class="btn btn-info btn-lg"><a style="text-decoration:none" class="text-white" href="{{ route('login') }}">Login</a></button></li>
                </ul>
        @else
            <div class="row">
                <h4 class="mt-2 mr-2 text-white">{{ $user -> name }}</h4>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <button class="btn btn-info btn-lg">
                    <a style="text-decoration:none;color:white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-power-off"></i>
                    </a>
                </button>
            </div>
        @endif
    </div>
</nav>



