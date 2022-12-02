<template>
  <div class="gallery-container-top container col-md-5" style="height: 40%">
    <div class="row m-0">
      <h2>Conheça nossos produtos</h2>
    </div>
    <div class="row m-0 gallery-container-top-nav">
      <h3
        v-for="(item, i) in menuNav"
        @click.stop.prevent="getAtribut(item.label)"
        :key="i"
        class="col"
      >
        {{ item.label }}
      </h3>
    </div>
    <div class="row" style="">
      <div class="col-3" v-for="post in bikes.data" :key="post.id">
        <div class="card">
          <img
            :src="'/storage/' + post.thumb"
            class="img-fluid m-0"
            style="max-width: 8rem"
          />
          <div class="card-text" style="color: #000">
            <p class="h6 p-2">{{ post.title }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    urlBikes: "http://127.0.0.1:8000/api/bikes?page=1&valor=8",
    urlAcessos: "http://127.0.0.1:8000/api/produtos?page=1&filtro=id:like:1",
    urlCompon: "http://127.0.0.1:8000/api/produtos?page=1&filtro=id:like:2",
    urlVestu: "http://127.0.0.1:8000/api/produtos?page=1&filtro=id:like:3",

    bikes: { data: [] },
    produtos: { data: [] },
    acessos: { data: [] },
    compon: { data: [] },
    vestu: { data: [] },
    loading: true,
    loader: false,
    validate: false,
    errored: false,
    conteudo: { data: [] },
    menuNav: [
      { label: "Bicicletas" },
      { label: "Acessórios" },
      { label: "Componentes" },
      { label: "Vestuário" },
    ],
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
        });
    },
  },
  mounted() {
    this.getBikes();
  },
};
</script>
