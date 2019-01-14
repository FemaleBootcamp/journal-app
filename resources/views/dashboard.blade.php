@extends('layout.welcome')
@section('content')
<div class="container text-center" xmlns:v-bind="http://www.w3.org/1999/xhtml">
    <section>
        <div class="row">
            <h4 class="mt-5 col-6 text-center text-white">{{ $user -> name }}'s <span>Journal</span> </h4>
            <h4 class="mt-5 col-6 text-center text-white"><span><i class="fa fa-filter"></i> Filter</span> </h4>
        </div>
        <button class="btn btn-primary mt-3" id="show-journal-create-modal" @click="showJournalCreateModal = true">Add New</button>
        <add-journal-modal  v-if="showJournalCreateModal" @close="showJournalCreateModal = false"></add-journal-modal>


        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-5 offset-lg-7">
                <form id="filter-journal-form">
                <span class="label label-default">User:</span>
                    <span name="user_id" class="form-control mt-2" type="text" placeholder="User" >{{ $user->id }} </span>
                    <span class="label label-default">Date Range:</span>
                    <datepicker name="dateFrom" v-bind:dateFrom="dateFrom" placeholder="Date From:" v-bind="dateFrom" style="margin-bottom: 10px"></datepicker>
                    <datepicker name="dateTo" v-bind:dateTo="dateTo" placeholder="Date To:" v-bind="dateTo"></datepicker>
                    <span class="label label-default">Status Goal:</span>
                    <input name="goalStatus"  v-bind:goalStatus="goalStatus" class="form-control mt-2" type="text" placeholder="Status Goal">
                </form>
                <div slot="footer" style="margin-top: 10px; margin-right:-10px">
                    <button class="btn btn-primary modal-default-button mr-2" @click="read">Apply Filter</button>
                </div>
            </div>
        </div>
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
<script>

</script>
