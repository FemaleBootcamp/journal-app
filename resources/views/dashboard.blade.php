@extends('layout.welcome')
@section('content')
<div id='app' class="container text-center">
    <section>
        <div class="row">
            <h4 class="mt-5 col-6 text-center text-white">{{ $user -> name }}'s <span>Journal</span> </h4>
            <h4 class="mt-5 col-6 text-center text-white"><span><i class="fa fa-filter"></i> Filter</span> </h4>
        </div>
        <button class="btn btn-primary mt-3" id="show-journal-create-modal" @click="showJournalCreateModal = true">Add New</button>
        <modal-component v-if="showJournalCreateModal" @close="showJournalCreateModal = false"></modal-component>
    </section>
    <section>
        <journals-list></journals-list>
    </section>
</div>
@endsection