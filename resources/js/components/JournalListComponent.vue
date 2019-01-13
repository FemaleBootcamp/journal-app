<template>
    <div>        
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
                <journal v-for="journal in journals" v-bind="journal" :key="journal.id"></journal>
            </tbody>
        </table>
    </div>
</template>
<script>
    function Journal({id, date}) {
        this.id = id;
        this.date = date;
    }

    export default {
        props: ['user_id', 'date', 'goalStatus'],
        methods: {
            read(){
                window.axios.get('/api/journals').then(({data}) => {
                    data.forEach(journal => {
                        this.journals.push(new Journal(journal));
                    });
                }, error => {
                    console.error(error);
                });
            },
        },
        created() {
            this.read();
        }
    }
</script>