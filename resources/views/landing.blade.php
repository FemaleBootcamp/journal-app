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
                    <img id="logo" src={{ asset('img/journal-app.png') }} alt="No-image">
                </div>
                <button class="btn btn-info btn-lg"><a style="text-decoration:none" class="text-white" href="{{ route('register') }}">Start Your FREE Journal</a></button>
        </div>
    </section>

    <br><br><br>

    <section class="row">
        <div id="qs" class="col-6">
        <br><br><br><br>
            <h2>Who is it for?</h2>
            <h5>Students, teacher, engineers <span>Who Cares! Basically Anyone!</span></h5>
        </div>
        <img style="width:50%;height:45%" class="col-6" src="{{ asset('img/people.png') }}" alt="No-image">
    </section>


    <br><br>

    <section class="row">

        <img style="width:50%;height:60%" class="col-5" src="{{ asset('img/technology.png') }}" alt="No-image">

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
        <img style="width:50%;height:70%" class="col-6" src="{{ asset('img/brain.png') }}" alt="No-image">
    </section>

    <section class="row">

        <img style="width:50%;height:50%" class="col-5" src="{{ asset('img/stats.png') }}" alt="No-image">

        <div id="qs" class="col-7 text-right">
        <br><br><br><br><br><br>
            <h2>Whoa all this and it's free?!</h2>
            <h5>Absolutely, and that's not all. You can <span>see your stats anytime!</span></h5>
        </div>
        
    </section>

    <section id='qs' class='text-center'>
        <h1>So, what are you waiting for?!</h1>
        <br><br>
        <a style="text-decoration:none" class="text-white" href="{{ route('register') }}"><button href="{{ route('register') }}" class="btn btn-info btn-lg text-white">Start Your FREE Journal NOW!</button></a>
        <br><br><br>

    </section>

    <section>
            <button id="show-modal" @click="showModal = true">Show Modal</button>
        <!-- use the modal component, pass in the prop -->
            <modal v-if="showModal" @close="showModal = false"></modal>
    </section>
</div>

@endsection

