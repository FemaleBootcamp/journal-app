new Vue({
    el: '#root',
    data: {

        journals: []
    },

    created(){
        //Make an AJAX request - axios
        axios.get('/api/journals').then(response => this.journals = response.data);
    }
});