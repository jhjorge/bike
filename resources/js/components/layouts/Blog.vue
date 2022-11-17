<template>
  <div>
    <div class="container my-4">
      <div class="row my-4">
        <h1 class="h1 col-md-8 my-2">Blog</h1>
        <div class="col-md-4">
          <modal-component id="modalBlog" titulo="Adicionar Post">
            <template v-slot:alertText>
              <alert-component
                titleText="Erro ao tentar cadastrar o Post"
                :msg="fetchDetails"
                tipo="danger"
                v-if="fetchStatus == 'erro'"
              ></alert-component>
              <alert-component
                titleText="Post Criado!"
                :msg="fetchDetails"
                tipo="success"
                v-if="fetchStatus == 'criado'"
              ></alert-component>
            </template>
            <template v-slot:conteudo>
              <div class="mb-3">
                <label for="tituloPostModal" class="form-label"
                  >Titulo do Post</label
                >
                <input
                  v-model="tituloPost"
                  type="text"
                  class="form-control"
                  id="tituloPostModal"
                />
              </div>
              <div class="mb-3">
                <label for="slugPostModal" class="form-label">Slug</label>
                <input
                  v-model="slugPost"
                  type="text"
                  class="form-control"
                  id="slugPostModal"
                />
              </div>
              <div class="mb-3">
                <label for="conteudoPostModal" class="form-label"
                  >Conteudo do Post</label
                >
                <textarea
                  v-model="conteudoPost"
                  class="form-control"
                  id="conteudoPostModal"
                  rows="6"
                ></textarea>
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label"
                  >Imagem de Destaque</label
                >
                <input
                  @change="carregarImg($event)"
                  class="form-control"
                  type="file"
                  id="formFile"
                />
              </div>
            </template>
            <template v-slot:footerModal>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Fechar
                </button>
                <button @click="salvar()" type="button" class="btn btn-primary">
                  Concluir
                </button>
              </div>
            </template>
          </modal-component>
          <button type="button" class="btn btn-primary" @click="loadList">
            Carregar Posts
          </button>
          <button
            type="button"
            class="btn mx-1 btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modalBlog"
          >
            Nova Postagem
          </button>
        </div>
      </div>
      <div class="container">
        <section v-if="errored">
          <p>
            Pedimos desculpas, não estamos conseguindo recuperar as informações
            no momento. Por favor, tente novamente mais tarde.
          </p>
        </section>
        <section v-else>
          <div v-if="loading">Carregando...</div>
          <div v-else class="row">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Titulo</th>
                  <th scope="col">Thumbnail</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Data de criação</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Excluir</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="post in posts" :key="post.id">
                  <th>{{ post.id }}</th>
                  <td>{{ post.title }}</td>
                  <td><img :src="'/storage/' + post.thumb" /></td>
                  <td>{{ post.slug }}</td>
                  <td>{{ formatDate(post.created_at) }}</td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>
  
  <script>
import Modal from "../comuns/Modal.vue";

export default {
  name: "Blog",
  component: { Modal },

  data: () => ({
    urlPosts: "https://goodnine.com.br/api/posts",
    posts: [],
    loading: true,
    errored: false,
    tituloPost: null,
    slugPost: null,
    conteudoPost: null,
    imagemPost: [],
    fetchStatus: null,
    fetchDetails: null,
  }),

  methods: {
    salvar() {
      let formData = new FormData();
      formData.append("title", this.tituloPost);
      formData.append("slug", this.slugPost);
      formData.append("content", this.conteudoPost);
      formData.append("thumb", this.imagemPost[0]);
      let config = {
        Headers: {
          "Content-Type": "multipart/form-data",
          Accept: "application/json",
        },
      };

      axios
        .post(this.urlPosts, formData, config)
        .then((response) => {
          this.fetchStatus = "criado";
          this.fetchDetails = response;
        })
        .catch((erros) => {
          this.fetchStatus = "erro";
          this.fetchDetails = erros.response;
        });
    },

    loadList() {
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
    carregarImg(e) {
      this.imagemPost = e.target.files;
    },

    currencydecimal(value) {
      return value.toFixed(2);
    },
    formatDate(dateString) {
      const date = new Date(dateString);
      return new Intl.DateTimeFormat("default", { dateStyle: "short" }).format(
        date
      );
    },
  },
  mounted() {
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
};
</script>
  