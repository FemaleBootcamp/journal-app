@extends('layout.welcome')
@section('content')
<div class="container text-center">
    <section>
        <div class="row">
            <h4 class="mt-5 col-6 text-center text-white">{{ $user -> name }}'s <span>Journal</span> </h4>
            <h4 class="mt-5 col-6 text-center text-white"><span><i class="fa fa-filter"></i> Filter</span> </h4>
        </div>
        <button class="btn btn-primary mt-3" id="show-journal-create-modal" @click="showJournalCreateModal = true">Add New</button>
        <add-journal-modal  v-if="showJournalCreateModal" @close="showJournalCreateModal = false"></add-journal-modal>
    </section>
    <section>
        <journals-list></journals-list>
    </section>
</div>
@endsection