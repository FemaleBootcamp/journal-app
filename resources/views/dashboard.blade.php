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


        <button class="btn btn-primary mt-3" id="show-journal-filter-modal" @click="showJournalFilterModal = true" style="margin-left: 530px">Filter Journals</button>
        <filter-journal-modal  v-if="showJournalFilterModal" @close="showJournalFilterModal = false"></filter-journal-modal>

    </section>
    <section>
        <journals-list
                user_id="1"
                dateFrom="2019-10-01"
                dateTo="2019-10-02"
                goalStatus="1"
       ></journals-list>
    </section>
</div>
@endsection
