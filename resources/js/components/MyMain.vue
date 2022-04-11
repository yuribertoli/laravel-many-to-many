<template>
    <main>
        <div class="container">
            <h1>Elenco dei post</h1>

            <div class="row">
                <div class="col-4" v-for="post in posts" :key="post.id">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">{{ post.title }}</h5>
                    <p class="card-text">{{ post.content }}</p>
                    <a href="#" class="btn btn-primary">Vedi articolo completo</a>
                    </div>
                </div>
                </div>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item" :class="(currentPage == 1)?'disabled':''" ><span class="page-link" @click="getAxios(currentPage - 1)">Precedente</span></li>
                    <li class="page-item" :class="(currentPage == lastPage)?'disabled':''"><span class="page-link" @click="getAxios(currentPage + 1)">Successivo</span></li>
                </ul>
            </nav>

        </div>
    </main>
</template>

<script>
export default {
    name: 'MyMain',

    data() {
        return {
            posts: [],
            currentPage: 1,
            lastPage: null
        }
    },

    methods: {

        getAxios(apiPage){
            axios.get('/api/posts', {
                params: {
                    'page': apiPage
                }   
            })
            .then((response) => {

                console.log(response);

                this.posts = response.data.results.data; //salvo dentro la variabile i risultati della chiamata axios
                this.currentPage = response.data.results.current_page; //setto la pagina corrente, derivante
                this.lastPage = response.data.results.last_page;
            })
        }
    },

    created() {
        this.getAxios();
    }
}
</script>

<style>

</style>