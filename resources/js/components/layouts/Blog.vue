<template>
  <div>
    <modal-component id="modalBlog" titulo="Adicionar Post" largura="modal-lg">
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
          <label for="tituloPostModal" class="form-label">Titulo do Post</label>
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
          <QuillEditor
            theme="snow"
            ref="myEditor4"
            toolbar="full"
            v-model:content="conteudoPost"
            contentType="html"
            id="apresentacaoModal"
          />
        </div>
        <div class="mb-3">
          <label for="formFileStore" class="form-label"
            >Imagem de Destaque</label
          >
          <input
            @change="carregarImg($event)"
            class="form-control"
            type="file"
            id="formFileStore"
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
      :setInfo="objInfo.data"
      id="atualizarPost"
      titulo="Atualizar Post"
      largura="modal-lg"
    >
      <template v-slot:alertText>
        <alert-component
          titleText="Erro ao tentar atualizar o Post"
          :msg="fetchDetails"
          tipo="danger"
          v-if="fetchStatus == 'error'"
        ></alert-component>
        <alert-component
          titleText="Post Atualizado!"
          :msg="fetchDetails"
          tipo="success"
          v-if="fetchStatus == 'atualizado'"
        ></alert-component>
      </template>

      <template v-slot:conteudo>
        <div class="mb-3">
          <label for="atualizaTituloPost" class="form-label"
            >Titulo do Post</label
          >
          <input
            v-model="objInfo.title"
            type="text"
            class="form-control"
            id="atualizaTituloPost"
          />
        </div>

        <div class="mb-3">
          <label for="atualizaConteudoPost" class="form-label"
            >Conteudo do Post</label
          >
          <QuillEditor
            theme="snow"
            v-if="objInfo.content"
            toolbar="full"
            v-model:content="objInfo.content"
            contentType="html"
            id="apresentacaoModal"
          />
        </div>
        <div class="mb-3">
          <label for="atualizaformFile" class="form-label"
            >Alterar Imagem ?</label
          >
          <input
            @change="carregarImg($event)"
            class="form-control"
            type="file"
            id="atualizaformFile"
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
            @click="atualizar(objInfo) & spinnerButton()"
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

            Atualizar
          </button>
        </div>
      </template>
    </modal-component>

    <modal-component
      id="deletePost"
      :setInfo="objInfo.data"
      :titulo="'Deletar ' + objInfo.title"
      largura="modal-lg"
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
          <div class="row mb-3">
            <label for="ContentInfo" class="label form-label">Conteudo</label>

            <div class="border rounded p-1" v-html="objInfo.content"></div>
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
      :setInfo="objInfo.data"
      titulo="Visualizar Post"
      largura="modal-lg"
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
          <div class="row mb-3" v-if="objInfo.content">
            <label for="ContentInfo" class="label form-label">Conteudo</label>

            <div class="border rounded p-1" v-html="objInfo.content"></div>
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

    <div class="container my-4">
      <div class="row my-3">
        <div class="col-md-7 col-sm-4">
          <h1 class="h1 title-page my-3 my-md-2">
            Blog<button
              v-if="posts.total"
              data-toggle="tooltip"
              data-placement="top"
              title="Total de Posts"
              type="button"
              class="btn btn-total btn-primary"
            >
              {{ posts.total }}
            </button>
          </h1>
        </div>
        <div class="col-md-5 p-2">
          <div class="card">
            <div class="card-header">
              <h2 class="h5">Pesquisar <i class="bi bi-search"></i></h2>
            </div>
            <div class="card-body">
              <form>
                <div class="form-row row">
                  <div class="col-md-3 my-1">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">ID</div>
                      </div>
                      <input
                        type="text"
                        class="form-control"
                        id="idBuscaPost"
                        v-model="busca.id"
                      />
                    </div>
                  </div>
                  <div class="col-md-9 my-1">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Titulo</div>
                      </div>
                      <input
                        type="text"
                        class="form-control"
                        id="tituloBuscaPost"
                        v-model="busca.title"
                      />
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="card-footer">
              <div class="container text-end">
                <button
                  @click.prevent="pesquisarPost()"
                  type="submit"
                  class="btn btn-primary"
                >
                  Pesquisar
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card my-4 p-0">
        <div class="card-header">
          <h2 class="h5">Lista de Posts</h2>
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
              <tabela-component>
                <template v-slot:topo>
                  <th scope="col">ID</th>
                  <th scope="col">Titulo</th>
                  <th scope="col">Imagem</th>
                  <th scope="col">Data de criação</th>
                  <th scope="col"></th>
                </template>
                <template v-slot:conteudo>
                  <tr v-for="post in posts.data" :key="post.id">
                    <th>{{ post.id }}</th>
                    <td>{{ post.title }}</td>
                    <td>
                      <img
                        :src="'/storage/' + post.thumb"
                        class="img-thumbnail img-tabela"
                      />
                    </td>
                    <td>{{ formatDate(post.created_at) }}</td>
                    <td class="btn-tabela">
                      <button
                        data-bs-toggle="modal"
                        data-bs-target="#visualizarModal"
                        class="btn btn-outline-primary btn-small"
                        @click="setStore(post)"
                      >
                        Visualizar
                      </button>
                      <button
                        data-bs-toggle="modal"
                        data-bs-target="#atualizarPost"
                        class="
                          btn btn-outline-primary
                          mx-md-2 mx-0
                          my-2 my-md-0
                          btn-small
                        "
                        @click="setStore(post)"
                      >
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
                    </td>
                  </tr>
                </template>
              </tabela-component>
            </div>
          </section>
        </div>
        <div class="card-footer pt-md-3">
          <div class="col">
            <paginate-component>
              <template v-slot:pagina>
                <div class="btn-group">
                  <li
                    v-for="(link, i) in posts.links"
                    :key="i"
                    @click="page(link)"
                    :class="link.active ? 'page-item active' : 'page-item'"
                  >
                    <a class="page-link" v-html="link.label"></a>
                  </li>
                </div>
              </template>
            </paginate-component>
          </div>
          <div class="col-md-8 text-end">
            <button type="button" class="btn btn-secondary" @click="loadList">
              Atualizar
            </button>
            <button
              type="button"
              class="btn mx-md-1 mt-2 mt-md-0 btn-primary"
              data-bs-toggle="modal"
              data-bs-target="#modalBlog"
            >
              Nova Postagem
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
  name: "Blog",
  component: { Modal },

  data: () => ({
    urlPosts: "https://goodnine.com.br/api/posts",
    posts: { data: [] },
    loading: true,
    loader: false,
    errored: false,
    tituloPost: null,
    conteudoPost: [],
    imagemPost: [],
    fetchStatus: null,
    fetchDetails: null,
    objInfo: [],
    busca: { id: "", title: "" },
    urlPaginacao: "",
    urlFiltro: "",
  }),

  methods: {
    pesquisarPost() {
      let filtro = "";

      for (let chave in this.busca) {
        if (this.busca[chave]) {
          if (filtro != "") {
            filtro += ";";
          }
          if (this.busca["id"]) {
            filtro += chave + ":like:" + this.busca[chave] + "%";
          } else {
            filtro += chave + ":like:" + "%" + this.busca[chave] + "%";
          }
        }
      }
      if (filtro != "") {
        this.urlPaginacao = "page=1";
        this.urlFiltro = "&filtro=" + filtro;
      } else {
        this.urlFiltro = "";
      }
      this.loadList();
      this.busca.id = "";
      this.busca.title = "";
    },
    resetContent() {
      this.$refs.myEditor4.setHTML("");
    },

    page(link) {
      if (link.url) {
        this.urlPaginacao = link.url.split("?")[1];
        this.loadList();
      }
    },

    atualizar(obj) {
      let formData = new FormData();
      formData.append("_method", "patch");
      formData.append("title", obj.title);
      formData.append("content", obj.content);
      if (this.imagemPost[0]) {
        formData.append("thumb", this.imagemPost[0]);
      }
      let url = this.urlPosts + "/" + obj.id;
      let config = {
        Headers: {
          "Content-Type": "multipart/form-data",
          Accept: "application/json",
        },
      };

      axios
        .post(url, formData, config)
        .then((response) => {
          setTimeout(() => {
            this.fetchStatus = "atualizado";
            this.fetchDetails = response;
            this.loadList();
            atualizaformFile.value = "";
          }, 2000);
          this.fetchStatus = !true;
          this.fetchDetails = !true;
        })
        .catch((errors) => {
          setTimeout(() => {
            this.fetchStatus = "error";
            this.fetchDetails = errors.response;
            this.loadList();
            this.clearField();
            atualizaformFile.value = "";
          }, 2000);
          this.fetchStatus = !true;
          this.fetchDetails = !true;
        });
    },

    spinnerButton() {
      this.loader = !false;
      setTimeout(() => {
        this.loader = !true;
      }, 2000);
    },
    clearField() {
      this.tituloPost = null;
      this.conteudoPost = null;
      formFileStore.value = "";
      this.resetContent();
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
          this.loadList();
          this.fetchStatus = "removido";
          this.fetchDetails = response;
        })
        .catch((errors) => {
          this.fetchStatus = "deleteErro";
          this.fetchDetails = errors.response;
        });
    },

    loadList() {
      this.loading = !this.loading;

      let url = this.urlPosts + "?" + this.urlPaginacao + this.urlFiltro;
      console.log(url);

      axios
        .get(url)
        .then((response) => {
          this.posts = response.data;
        })
        .catch((error) => {
          console.log(error);
          this.errored = true;
          this.urlPaginacao = "";
          this.urlFiltro = "";
          this.urlPosts = "https://goodnine.com.br/api/posts";
        })
        .finally(() => (this.loading = false));
      this.clearField();
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
<style lang="sass" scoped>
.title-page
  font-size: 4rem
.btn-total
  border-radius: 50px
  padding: 0.1rem 0.5rem
  margin-left: -10px
  margin-top: -35px
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
  