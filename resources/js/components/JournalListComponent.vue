<template>
    <div>
        <div class="row">
            <div class="col-lg-4 offset-lg-8">
                <form id="filter-journal-form">
                    <input id="user_id" name="user_id" type="hidden">
                    <h5 class="mt-5 col-6 text-left text-white" style="alignment: left"><span>Date Range:</span></h5>
                    <datepicker format="yyyy-MM-dd" name="dateFrom" placeholder="Date From:"
                                style="margin-bottom: 10px" v-model="dateFrom"></datepicker>
                    <datepicker format="yyyy-MM-dd" name="dateTo" placeholder="Date To:" v-model="dateTo"></datepicker>
                    <h5 class="mt-5 col-lg-12 text-left text-white"><span
                            style="alignment: left">Status of the Goal:</span></h5>
                    <input class="form-control mt-2" name="goalStatus" placeholder="Status Goal" type="text"
                           v-model="goalStatus">
                </form>
                <div slot="footer" style="margin-top: 10px; margin-right:-10px; margin-bottom: 60px">
                    <button @click="filter" class="btn btn-primary modal-default-button mr-2">Apply Filter</button>
                </div>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Goal for tomorrow</th>
                <th scope="col">Achievment</th>
                <th scope="col">Grade for the day</th>
                <th scope="col">Details</th>
            </tr>
            </thead>
            <tbody>
            <journal :key="journal.id" v-bind="journal" v-for="journal in journals"></journal>
            </tbody>
        </table>


    </div>
</template>
<script>
    import Datepicker from 'vuejs-datepicker';

    function Journal({id, date}) {
        this.id = id;
        this.date = date;
    }


    export default {
        components: {
            Datepicker
        },
        data() {
            return {
                journals: []
            };
        },
        methods: {
            read(dateFrom, dateTo, goalStatus) {
                window.axios.get('/api/journals' + $('#filter-journal-form').serialize()).then(({data}) => {
                    data.forEach(journal => {
                        this.journals.push(new Journal(journal));
                    });
                }, error => {
                    console.error(error);
                });
            },
            filter() {
                this.journals = [];
                this.read(dateFrom,dateTo,goalStatus);
            }
        },
        created() {
            this.read(dateFrom,dateTo,goalStatus);
        }
    }
</script>
