<template>
  <div>
    <div class="container text-center">
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
            <label for="formFile" class="form-label">Imagem de Destaque</label>
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
            <button
              @click="salvar() & spinnerButton()"
              type="button"
              class="btn btn-primary"
            >
              <div v-if="loader">
                <span
                  class="spinner-border spinner-border-sm"
                  role="status"
                  aria-hidden="true"
                ></span>
              </div>

              Concluir
            </button>
          </div>
        </template>
      </modal-component>

      <modal-component
        id="deletePost"
        :setInfo="objInfo"
        :titulo="'Deletar ' + objInfo.title"
      >
        <template v-slot:alertText>
          <alert-component
            titleText="Erro ao tentar remover o Post"
            :msg="fetchDetails"
            tipo="danger"
            v-if="fetchStatus == 'deleteErro'"
          ></alert-component>
          <alert-component
            titleText="Post Removido!"
            :msg="fetchDetails"
            tipo="success"
            v-if="fetchStatus == 'removido'"
          ></alert-component>
        </template>

        <template v-slot:conteudo>
          <div class="container">
            <div class="row">
              <h5>{{ objInfo.title }}</h5>
              <img
                :src="'/storage/' + objInfo.thumb"
                class="img-thumbnail"
                v-if="objInfo.thumb"
              />
            </div>
            <div class="row mt-2">
              <label for="ContentInfo" class="label form-label"
                >Conteudo:</label
              >
              <textarea
                id="ContentInfo"
                disabled
                :value="objInfo.content"
                rows="5"
                v-if="objInfo.content"
              ></textarea>
            </div>
            <div class="row mt-2">
              <div class="col-5" v-if="objInfo.created_at">
                <span class="text-muted"
                  >Criado: {{ formatDate(objInfo.created_at) }}
                </span>
              </div>
              <div class="col-5" v-if="objInfo.updated_at">
                <span class="text-muted"
                  >Atualizado: {{ formatDate(objInfo.updated_at) }}
                </span>
              </div>
            </div>
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
            <button
              type="button"
              class="btn btn-danger"
              @click="removePost(objInfo.id) & spinnerButton()"
            >
              <div v-if="loader">
                <span
                  class="spinner-border spinner-border-sm"
                  role="status"
                  aria-hidden="true"
                ></span>
              </div>

              Remover
            </button>
          </div>
        </template>
      </modal-component>

      <modal-component
        id="visualizarModal"
        :setInfo="objInfo"
        titulo="Visualizar Post"
      >
        <template v-slot:conteudo>
          <div class="container">
            <div class="row">
              <h5>{{ objInfo.title }}</h5>
              <img
                :src="'/storage/' + objInfo.thumb"
                class="img-thumbnail"
                v-if="objInfo.thumb"
              />
            </div>
            <div class="row mt-2">
              <label for="ContentInfo" class="label form-label"
                >Conteudo:</label
              >
              <textarea
                id="ContentInfo"
                disabled
                :value="objInfo.content"
                rows="5"
                v-if="objInfo.content"
              ></textarea>
            </div>
            <div class="row mt-2">
              <div class="col-5" v-if="objInfo.created_at">
                <span class="text-muted"
                  >Criado: {{ formatDate(objInfo.created_at) }}
                </span>
              </div>
              <div class="col-5" v-if="objInfo.updated_at">
                <span class="text-muted"
                  >Atualizado: {{ formatDate(objInfo.updated_at) }}
                </span>
              </div>
            </div>
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
          </div>
        </template>
      </modal-component>

      <h1 class="h1 col-md my-2">Ultimos Post</h1>
      <div class="col-md">
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
  </div>
  <div class="container">
    <section v-if="errored">
      <p>
        Pedimos desculpas, não estamos conseguindo recuperar as informações no
        momento. Por favor, tente novamente mais tarde.
      </p>
    </section>
    <section v-else>
      <div v-if="loading">Carregando...</div>
      <div class="card-deck d-flex flex-wrap" v-else>
        <div
          v-for="post in posts"
          :key="post.id"
          class="card my-2"
          style="width: 19rem"
        >
          <img
            class="card-img-top card-img-post"
            :src="'/storage/' + post.thumb"
            alt="Card image cap"
          />
          <div class="card-body">
            <h5 class="card-title">{{ post.title }}</h5>
            <span><b>ID:</b> {{ post.id }}</span>
            <p
              class="card-text text-truncate text-wrap"
              style="max-width: 250px; max-height: 120px"
            >
              {{ post.content }}
            </p>
            <p class="card-text">
              <small class="text-muted"
                >Atualizado: {{ formatDate(post.updated_at) }}</small
              >
            </p>
            <div class="botoes-card">
              <button
                data-bs-toggle="modal"
                data-bs-target="#visualizarModal"
                class="btn btn-outline-primary btn-small"
                @click="setStore(post)"
              >
                Visualizar
              </button>
              <button class="btn btn-outline-primary mx-1 btn-small">
                Editar
              </button>
              <button
                class="btn btn-outline-danger btn-small"
                data-bs-toggle="modal"
                data-bs-target="#deletePost"
                @click="setStore(post)"
              >
                Remover
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
  
  <script>
import Modal from "../comuns/Modal.vue";

export default {
  name: "Home",
  component: { Modal },

  data: () => ({
    urlPosts: "https://goodnine.com.br/api/posts",
    posts: [],
    loading: true,
    loader: false,
    errored: false,
    tituloPost: null,
    conteudoPost: null,
    imagemPost: [],
    fetchStatus: null,
    fetchDetails: null,
    objInfo: [],
  }),

  methods: {
    spinnerButton() {
      this.loader = !false;
      setTimeout(() => {
        this.loader = !true;
      }, 2000);
    },
    clearField() {
      this.tituloPost = null;
      this.conteudoPost = null;
      this.imagemPost = [];
    },
    salvar() {
      let formData = new FormData();
      formData.append("title", this.tituloPost);
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
          setTimeout(() => {
            this.fetchStatus = "criado";
            this.fetchDetails = response;
            this.clearField();
            this.loadList();
          }, 2000);
          this.fetchStatus = !true;
          this.fetchDetails = !true;
        })
        .catch((erros) => {
          setTimeout(() => {
            this.fetchStatus = "erro";
            this.fetchDetails = erros.response;
          }, 200);
          this.fetchStatus = null;
          this.fetchDetails = null;
        });
    },
    removePost(obj) {
      let confirma = confirm("Tem certeza que deseja remover este Post?");
      if (!confirma) {
        return false;
      }

      let formData = new FormData();
      formData.append("_method", "delete");

      let config = {
        headers: {
          Accept: "application/json",
        },
      };
      let url = this.urlPosts + "/" + obj;

      axios
        .post(url, formData, config)
        .then((response) => {
          setTimeout(() => {
            this.loadList();
            this.fetchStatus = "removido";
            this.fetchDetails = response;
          }, 2000);
          this.fetchStatus = null;
          this.fetchDetails = null;
        })
        .catch((errors) => {
          setTimeout(() => {
            this.fetchStatus = "deleteErro";
            this.fetchDetails = errors.response;
          }, 2000);
          this.fetchStatus = null;
          this.fetchDetails = null;
        });
    },

    loadList() {
      axios
        .get(this.urlPosts)
        .then((response) => {
          this.posts = response.data.data;
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
    setStore(obj) {
      this.objInfo = obj;
    },
  },
  mounted() {
    axios
      .get(this.urlPosts)
      .then((response) => {
        this.posts = response.data.data;
      })
      .catch((error) => {
        console.log(error);
        this.errored = true;
      })
      .finally(() => (this.loading = false));
  },
};
</script>
<style lang="sass" scoped>
.card-img-post
  max-width: 350px
  max-height: 180px
</style>
  