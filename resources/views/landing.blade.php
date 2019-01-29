<!-- Main Content -->
@extends('layout.welcome')
@section('content')
<!-- Main Content -->
<div class="container">
    <!-- text container -->
    <section>
        <div id="text">
            <br>
            <h1>Because everyone needs a private <span>Journal</span></h1>
            <h4>Create <span>beautiful memories</span> with</h4>

            <!-- logo container -->
            <div id="logo-container">
                <img id="logo" src="{{ asset('img/Journal-app.png') }}" alt="No-image">
            </div>
            <button class="btn btn-info btn-lg"><a style="text-decoration:none" class="text-white"
                    href="{{ route('register') }}">Start Your FREE Journal</a></button>
        </div>
    </section>

    <section class="row">
        <div id="qs" class="col-6 mb-auto mt-auto">
            <h2>Who is it for?</h2>
            <h5>Students, teachers, engineers <span>Who Cares! Basically Anyone!</span></h5>
        </div>
        <img style="width:50%;height:45%" class="col-6" src="{{ asset('img/people.png') }}" alt="No-image">
    </section>

    <section class="row">
        <img style="width:50%;height:60%" class="col-6" src="{{ asset('img/technology.png') }}" alt="No-image">
        <div id="qs" class="col-6 mb-auto mt-auto text-right">
            <h2>What it does?</h2>
            <h5>Keep your memories, <span> all in one place!</span></h5>
        </div>
    </section>

    <section class="row">
        <div id="qs" class="col-6 mb-auto mt-auto">
            <h2>Memories</h2>
            <h5>See how far you've come <span>with memories!</span></h5>
        </div>
        <img style="width:50%;height:50%" class="col-6" src="{{ asset('img/brain.png') }}" alt="No-image">
    </section>

    <section class="row">
        <img style="width:50%;height:50%" class="col-6" src="{{ asset('img/stats.png') }}" alt="No-image">
        <div id="qs" class="col-6 text-right mb-auto mt-auto">
            <h2>Whoa all this and it's free?!</h2>
            <h5>Absolutely, and that's not all. You can <span>see your stats anytime!</span></h5>
        </div>
    </section>

    <section id='qs' class='text-center'>
        <h1 class="mb-5">So, what are you waiting for?!</h1>
        <a style="text-decoration:none" class="text-white" href="{{ route('register') }}"><button
                href="{{ route('register') }}" class="btn btn-info btn-lg text-white">Start Your FREE Journal
                NOW!</button></a>
    </section>

</div>

@endsection