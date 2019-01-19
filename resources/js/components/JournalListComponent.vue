<template>
    <div>
        <div class="row">
            <div class="col-lg-3 d-lg-inline">
                <form id="filter-journal-form">
                    <input id="user_id" v-model="userid" name="user_id" type="hidden">
                    <h5 class="mt-5 text-left text-white" style="alignment: left"><span>Date Range:</span></h5>
                    <datepicker name="dateFrom" placeholder="Date From:"
                                style="margin-bottom: 10px" v-model="dateFrom"></datepicker>
                    <datepicker name="dateTo" placeholder="Date To:" v-model="dateTo"></datepicker>
                </form>
            </div>
            <div class="col-lg-4 offset-1">
                <h5 class="mt-5 text-left text-white"><span
                        style="alignment: left">Status of the Goal:</span></h5>
                <div class="form-group">
                    <select class="form-control" id="sel1">
                        <option v-model="goalStatus">Achieved</option>
                        <option v-model="goalStatus">Not-Achieved</option>
                    </select>
                </div>
                <button @click="filter" class="btn btn-primary modal-default-button mr-2">Apply Filter</button>
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
    import moment from 'moment';

    Vue.prototype.moment = moment;

    function Journal({id, date}) {
        this.id = id;
        this.date = date;
    }


    export default {
        components: {
            Datepicker
        },
        props: ['userid'],
        data() {
            return {
                journals: [],
                dateFrom: null,
                dateTo: null,
                goalStatus: null,
            };
        },
        methods: {
            read(dateFrom = null, dateTo = null, goalStatus = null) {
                window.axios.get('/api/journals', {
                    params: {
                        userId: this.userid,
                        dateFrom: dateFrom,
                        dateTo: dateTo,
                        goalStatus: goalStatus,
                    }
                }).then(({data}) => {
                    data.forEach(journal => {
                        this.journals.push(new Journal(journal));
                    });
                }, error => {
                    console.error(error);
                });
            },
            filter() {
                this.journals = [];
                this.read(
                    this.dateFrom == null ? null : moment(this.dateFrom).format('YYYY-MM-DD'),
                    this.dateTo == null ? null : moment(this.dateTo).format('YYYY-MM-DD'),
                    this.goalStatus);
            }
        },
        created() {
            this.read();
        }
    }
</script>
