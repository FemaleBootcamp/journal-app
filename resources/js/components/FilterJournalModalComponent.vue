<template>
    <modal-component>
        <div slot="header">Filter Journals</div>
        <div slot="body">
            <form id="filter-journal-form">
                <span class="label label-default">User:</span>
                <input name="user_id" class="form-control mt-2" type="text" placeholder="User" >
                <span class="label label-default">Date Range:</span>
                <datepicker name="date" format="yyyy-MM-dd" placeholder="Date From:" class="form-control"></datepicker>
                <datepicker name="date" format="yyyy-MM-dd" placeholder="Date To:" class="form-control"></datepicker>

                <span class="label label-default">Status Goal:</span>
                <input name="goalStatus" class="form-control mt-2" type="text" placeholder="Status Goal">
            </form>
        </div>
        <div slot="footer">
            <button class="btn btn-danger modal-default-button" @click="$emit('close')">Cancel</button>
            <button class="btn btn-primary modal-default-button mr-2" @click="read()">Apply Filter</button>
        </div>
    </modal-component>
</template>
<script>
    import Datepicker from 'vuejs-datepicker';
    export default {
        components: {
            Datepicker
        }
    }
</script>