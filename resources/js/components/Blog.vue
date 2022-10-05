<template>
    <div class="container">
        <div class="row ">
            <div class="col-md-2">
                <div v-for="p in posts" :key="p.id"  class="card">
                    <b-card-group deck>
                            <b-card img-src="" img-alt="Card image" img-top>
                            <b-card-text>
                                {{p.content}}
                            
                            </b-card-text>
                            </b-card>
                    </b-card-group>
                </div>
            </div>
        </div>
    </div>    
</template>;
<script>
export default {
   data() {
    return {
        urlBase:'http://localhost:8000/api/posts',
        posts:[],
        
    }
   },
   props:[],
   methods: {
    carregarLista(){
        axios.get(this.urlBase)
        .then(response=>{
            this.posts = response.data

        })
        .catch(errors =>{
            console.log(errors)
        })

    }
    
   },
   mounted() {
    this.carregarLista()

   },
}
</script>