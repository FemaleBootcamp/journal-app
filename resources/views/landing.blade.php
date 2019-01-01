<!-- Main Content -->
@extends('layout.welcome')
@section('content')
    <!-- Main Content -->
    <div class="container">

<!-- text container -->


<br><br><br><br><br>

<section class="row">
    <div id="qs" class="col-6">
    <br><br><br>
        <h2>Who is it for?</h2>
        <h5>Students, teacher, engineers <span>Who Cares! Basically Anyone!</span></h5>
    </div>
    <img style="width:50%;height:50%" class="col-6" src="{{ asset('img/people.png') }}" alt="No-image">
</section>


<br><br>

<section class="row">

    <img style="width:50%;height:50%" class="col-5" src="{{ asset('img/technology.png') }}" alt="No-image">

    <div id="qs" class="col-7 text-right">
    <br><br><br><br><br><br><br><br>
        <h2>What it does?</h2>
        <h5>Keep your memories, <span> all in one place!</span></h5>
    </div>
    
</section>

<section class="row">
    <div id="qs" class="col-6">
    <br><br><br><br><br><br><br><br>
        <h2>Memories</h2>
        <h5>See how far you've come <span>with memories!</span></h5>
    </div>
    <img style="width:50%;height:50%" class="col-6" src="{{ asset('img/brain.png') }}" alt="No-image">
</section>

<section class="row">

    <img style="width:50%;height:50%" class="col-5" src="{{ asset('img/stats.png') }}" alt="No-image">

    <div id="qs" class="col-7 text-right">
    <br><br><br><br><br><br><br><br>
        <h2>Whoa all this and it's free?!</h2>
        <h5>Absolutely, and that's not all. You can <span>see your stats anytime!</span></h5>
    </div>
    
</section>

<section id='qs' class='text-center'>
    <h1>So, what are you waiting for?!</h1>
    <br><br>
    <button class="btn btn-info btn-lg text-white">Start Your FREE Journal NOW!</button>
    <br><br><br>

</section>
</div>
@stop
@include('layout.header')
