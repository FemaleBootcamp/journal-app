@extends('layout.welcome')
@section('content')
<div class="container text-center" xmlns:v-bind="http://www.w3.org/1999/xhtml"
     xmlns:v-on="http://www.w3.org/1999/xhtml">
    <section>
        <div class="row">
            <h4 class="mt-5 col-6 text-center text-white">{{ $user -> name }}'s <span>Journal</span> </h4>
            <h4 class="mt-5 col-6 text-center text-white"><span><i class="fa fa-filter"></i> Filter</span> </h4>
        </div>
        <journals-list userid="{{$user->id}}"></journals-list>
    </section>
</div>
@endsection

