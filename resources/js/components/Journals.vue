<template>
    <div>
        <h1>Journals</h1>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                journals: [],
                journal: {
                    id: '',
                    title: '',
                    body: ''
                }
            };
        },
        created() {
            this.fetchArticles();
        },
        methods: {
            fetchArticles(page_url) {
                let vm = this;
                page_url = page_url || '/api/journals';
                fetch(page_url)
                    .then(res => res.json())
                    .then(res => {
                        this.articles = res.data
                    })
                    .catch(err => console.log(err));
            }
        }
    }

</script>