<template>
    <modal-component>
        <div slot="header">Add new record</div>
        <div slot="body">  
            <form id="add-journal-form"> 
                <datepicker name="date" format="yyyy-MM-dd" placeholder="Date" class="form-control"></datepicker>
                <input name="database_column" class="form-control mt-2" type="text" placeholder="Text">
                <textarea name="database_column" class="form-control mt-2" id="exampleFormControlTextarea1" rows="3" placeholder="Plan for next day "></textarea>
                <input name="database_column" class="form-control mt-2" type="text" placeholder="Goal for tomorrow">
                <div class="form-check mt-2">
                    <input name="database_column" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                    Did you achieve today's goal?
                    </label>
                </div>
            </form>
        </div>
        <div slot="footer">
            <button class="btn btn-danger modal-default-button" @click="$emit('close')">Cancel</button>
            <button class="btn btn-primary modal-default-button mr-2" @click="$emit('close')">Save</button>
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