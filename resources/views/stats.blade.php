@extends('layout.welcome')
@section('content')
<div class="container text-center" xmlns:v-bind="http://www.w3.org/1999/xhtml"
     xmlns:v-on="http://www.w3.org/1999/xhtml">
    <section>
        <div class="row">
            <h4 class="mt-5 col-6 text-center text-white">{{ $user -> name }}'s <span>Journal Stats</span> </h4>
        </div>
    </section>
    <section>
        <stats-component></stats-component>
    </section>
</div>
@endsection