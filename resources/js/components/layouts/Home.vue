<template>
  <div>
    <!--Page-->
    <div class="container my-4">
      <div class="row my-3">
        <div class="col">
          <h1 class="h4 title-page my-3 my-md-2">Home</h1>
        </div>
      </div>
      <!--Seção Post-->
      <div class="card my-4 p-0">
        <div class="card-header">
          <h2 class="h5">Ultimos Posts</h2>
        </div>

        <div class="card-body">
          <section v-if="errored">
            <p>
              Pedimos desculpas, não estamos conseguindo recuperar as
              informações no momento. Por favor, tente novamente mais tarde.
            </p>
          </section>
          <section v-else>
            <div v-if="loading">Carregando...</div>
            <div v-else>
              <div class="row">
                <div
                  class="col-md-4 py-2 col-6"
                  v-for="post in posts.data"
                  :key="post.id"
                >
                  <div class="card" style="max-width: 22rem">
                    <div class="card-header">{{ post.title }}</div>
                    <img :src="'/storage/' + post.thumb" class="img-fluid" />

                    <div class="card-footer">
                      <div class="row mt-2">
                        <div class="col-5">
                          <span class="text-muted"
                            >Criado: {{ formatDate(post.created_at) }}
                          </span>
                        </div>
                        <div class="col-5">
                          <span class="text-muted"
                            >Atualizado: {{ formatDate(post.updated_at) }}
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="card-footer pt-md-3">
          <div class="col text-end">
            <button type="button" class="btn btn-secondary" @click="loadList">
              Atualizar
            </button>
          </div>
        </div>
      </div>
      <!--Seção Eventos-->
      <div class="card my-4 p-0">
        <div class="card-header">
          <h2 class="h5">Ultimos Eventos</h2>
        </div>

        <div class="card-body">
          <section v-if="errored">
            <p>
              Pedimos desculpas, não estamos conseguindo recuperar as
              informações no momento. Por favor, tente novamente mais tarde.
            </p>
          </section>
          <section v-else>
            <div v-if="loading">Carregando...</div>
            <div v-else>
              <div class="row">
                <div
                  class="col-md-4 py-2 col-6"
                  v-for="evento in eventos.data"
                  :key="evento.id"
                >
                  <div class="card" style="max-width: 22rem">
                    <div class="card-header">{{ evento.title }}</div>
                    <img :src="'/storage/' + evento.thumb" class="img-fluid" />

                    <div class="card-footer">
                      <div class="row mt-2">
                        <div class="col-5">
                          <span class="text-muted"
                            >Criado: {{ formatDate(evento.created_at) }}
                          </span>
                        </div>
                        <div class="col-5">
                          <span class="text-muted"
                            >Atualizado: {{ formatDate(evento.updated_at) }}
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="card-footer pt-md-3">
          <div class="col text-end">
            <button type="button" class="btn btn-secondary" @click="loadList">
              Atualizar
            </button>
          </div>
        </div>
      </div>
      <!--Seção Bikes-->
      <div class="card my-4 p-0">
        <div class="card-header">
          <h2 class="h5">Ultimas Bikes</h2>
        </div>

        <div class="card-body">
          <section v-if="errored">
            <p>
              Pedimos desculpas, não estamos conseguindo recuperar as
              informações no momento. Por favor, tente novamente mais tarde.
            </p>
          </section>
          <section v-else>
            <div v-if="loading">Carregando...</div>
            <div v-else>
              <div class="row">
                <div
                  class="col-md-4 py-2 col-6"
                  v-for="bike in bikes.data"
                  :key="bike.id"
                >
                  <div class="card" style="max-width: 22rem">
                    <div class="card-header">{{ bike.title }}</div>
                    <img :src="'/storage/' + bike.thumb" class="img-fluid" />

                    <div class="card-footer">
                      <div class="row mt-2">
                        <div class="col-5">
                          <span class="text-muted"
                            >Criado: {{ formatDate(bike.created_at) }}
                          </span>
                        </div>
                        <div class="col-5">
                          <span class="text-muted"
                            >Atualizado: {{ formatDate(bike.updated_at) }}
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="card-footer pt-md-3">
          <div class="col text-end">
            <button type="button" class="btn btn-secondary" @click="loadList">
              Atualizar
            </button>
          </div>
        </div>
      </div>
      <!--Seção Produtos-->
      <div class="card my-4 p-0">
        <div class="card-header">
          <h2 class="h5">Ultimos Produtos</h2>
        </div>

        <div class="card-body">
          <section v-if="errored">
            <p>
              Pedimos desculpas, não estamos conseguindo recuperar as
              informações no momento. Por favor, tente novamente mais tarde.
            </p>
          </section>
          <section v-else>
            <div v-if="loading">Carregando...</div>
            <div v-else>
              <div class="row">
                <div
                  class="col-md-4 py-2 col-6"
                  v-for="produto in produtos.data"
                  :key="produto.id"
                >
                  <div class="card" style="max-width: 22rem">
                    <div class="card-header">{{ produto.title }}</div>
                    <img :src="'/storage/' + produto.thumb" class="img-fluid" />

                    <div class="card-footer">
                      <div class="row mt-2">
                        <div class="col-5">
                          <span class="text-muted"
                            >Criado: {{ formatDate(produto.created_at) }}
                          </span>
                        </div>
                        <div class="col-5">
                          <span class="text-muted"
                            >Atualizado: {{ formatDate(produto.updated_at) }}
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="card-footer pt-md-3">
          <div class="col text-end">
            <button type="button" class="btn btn-secondary" @click="loadList">
              Atualizar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
  <script>
import Modal from "../comuns/Modal.vue";
import Paginate from "../comuns/Paginate.vue";

export default {
  components: { Paginate },
  name: "Eventos",
  component: { Modal },

  data: () => ({
    urlPosts: "http://127.0.0.1:8000/api/posts?valor=3",
    urlEventos: "http://127.0.0.1:8000/api/eventos?valor=3",
    urlBikes: "http://127.0.0.1:8000/api/bikes?valor=3",
    urlProdutos: "http://127.0.0.1:8000/api/produtos?valor=3",
    posts: { data: [] },
    eventos: { data: [] },
    bikes: { data: [] },
    produtos: { data: [] },
    loading: true,
    loader: false,
    errored: false,
  }),

  methods: {
    page(link) {
      if (link.url) {
        this.urlPaginacao = link.url.split("?")[1];
        this.loadList();
      }
    },

    loadList() {
      this.loading = !this.loading;

      this.getBikes();
      this.getEventos();
      this.getPosts();
      this.getProdutos();
    },

    formatDate(dateString) {
      const date = new Date(dateString);
      return new Intl.DateTimeFormat("default", { dateStyle: "short" }).format(
        date
      );
    },
    setStore(obj) {
      this.objInfo = obj;
    },
    getBikes() {
      axios
        .get(this.urlBikes)
        .then((response) => {
          this.bikes = response.data;
        })
        .catch((error) => {
          console.log(error);
          this.errored = true;
        })
        .finally(() => (this.loading = false));
    },
    getPosts() {
      axios
        .get(this.urlPosts)
        .then((response) => {
          this.posts = response.data;
        })
        .catch((error) => {
          console.log(error);
          this.errored = true;
        })
        .finally(() => (this.loading = false));
    },
    getEventos() {
      axios
        .get(this.urlEventos)
        .then((response) => {
          this.eventos = response.data;
        })
        .catch((error) => {
          console.log(error);
          this.errored = true;
        })
        .finally(() => (this.loading = false));
    },
    getProdutos() {
      axios
        .get(this.urlProdutos)
        .then((response) => {
          this.produtos = response.data;
        })
        .catch((error) => {
          console.log(error);
          this.errored = true;
        })
        .finally(() => (this.loading = false));
    },
  },
  mounted() {
    this.getBikes();
    this.getEventos();
    this.getPosts();
    this.getProdutos();
  },
};
</script>
<style lang="sass" scoped>
.title-page
  font-size: 4rem
.btn-total
  border-radius: 50px
  padding: 0.1rem 0.5rem
  margin-left: 2px
  margin-top: -8px
  z-index: 10
  font-size: 0.8rem
  animation-duration: 3s
.img-tabela
  max-height: 3rem
.btn-tabela

  text-align: center

.card
  .card-header
    width: 100%
  .card-body
    width: 100%
  .card-footer
    display: flex
    justify-content: end
    width: 100%
</style>
  