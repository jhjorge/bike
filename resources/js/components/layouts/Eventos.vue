<template>
  <!--Modal de Criação -->
  <div>
    <modal-component
      id="modalEvento"
      titulo="Adicionar Evento"
      largura="modal-lg"
    >
      <template v-slot:alertText>
        <alert-component
          titleText="Erro ao tentar cadastrar o Evento"
          :msg="fetchDetails"
          tipo="danger"
          v-if="fetchStatus == 'erro'"
        ></alert-component>
        <alert-component
          titleText="Evento Criado!"
          :msg="fetchDetails"
          tipo="success"
          v-if="fetchStatus == 'criado'"
        ></alert-component>
      </template>
      <template v-slot:conteudo>
        <div class="mb-3">
          <label for="tituloEventoModal" class="form-label"
            >Titulo do Evento</label
          >
          <input
            v-model="tituloPost"
            type="text"
            class="form-control"
            id="tituloEventoModal"
          />
        </div>
        <div class="mb-3">
          <label class="form-label" for="meeting-time">Data do evento</label>

          <input
            v-model="dataPost"
            type="input"
            id="meeting-time"
            class="mb-3 form-control"
          />
        </div>

        <div class="mb-3">
          <label for="localEventoModal" class="form-label"
            >Local do Evento</label
          >
          <input
            v-model="localPost"
            type="text"
            class="form-control"
            id="localEventoModal"
          />
        </div>

        <div class="mb-3">
          <label for="conteudoPostModal" class="form-label">Conteudo </label>
          <QuillEditor
            theme="snow"
            ref="myEditor5"
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
          <input @change="carregarImg($event)" class="form-control"
          accept=”image/*” type="file" id="formFileStoreThumb" />
        </div>
        <div class="mb-3">
          <label for="formFileStoreEvent" class="form-label"
            >Galeria de fotos</label
          >
          <input @change="carregarImgGaleria($event)" class="form-control"
          type="file" accept=”image/*” multiple id="formFileStoreEvent" />
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
    <!--Modal da Galeria-->
    <modal-component
      :setInfo="objInfo.data"
      id="modalGaleriaEvento"
      titulo="Galeria"
    >
      <template v-slot:conteudo>
        <div class="mb-3">
          <div class="card">
            <div class="card-body container">
              <img
                v-for="img in objInfo.gallery"
                :key="img.id"
                :src="'/storage/' + img"
                class="img-thumbnail col-6"
                style="max-width: 15rem"
              />
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
    <!--Modal de Atualizar!-->
    <modal-component
      :setInfo="objInfo.data"
      id="atualizarPost"
      titulo="Atualizar Evento"
      largura="modal-lg"
    >
      <template v-slot:alertText>
        <alert-component
          titleText="Erro ao tentar atualizar o Evento"
          :msg="fetchDetails"
          tipo="danger"
          v-if="fetchStatus == 'error'"
        ></alert-component>
        <alert-component
          titleText="Evento Atualizado!"
          :msg="fetchDetails"
          tipo="success"
          v-if="fetchStatus == 'atualizado'"
        ></alert-component>
      </template>

      <template v-slot:conteudo>
        <div class="mb-3">
          <label for="atualizaTituloPost" class="form-label"
            >Titulo do Evento</label
          >
          <input
            v-model="objInfo.title"
            type="text"
            class="form-control"
            id="atualizaTituloPost"
          />
        </div>

        <div class="mb-3">
          <label for="meeting-timeEdit" class="form-label"
            >Data do evento</label
          >

          <input
            v-model="objInfo.date"
            type="input"
            id="meeting-timeEdit"
            class="mb-3 form-control"
          />
        </div>
        <div class="mb-3">
          <label for="localEventoModal" class="form-label"
            >Local do Evento</label
          >
          <input
            v-model="objInfo.locale"
            type="text"
            class="form-control"
            id="localEventoModal"
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
          <input @change="carregarImg($event)" class="form-control" type="file"
          accept=”image/*” id="atualizaformFile" />
        </div>
        <div class="mb-3">
          <label for="formFileStoreEventEdit" class="form-label"
            >Alterar Galeria ?</label
          >
          <input @change="carregarImgGaleria($event)" class="form-control"
          type="file" accept=”image/*” multiple id="formFileStoreEventEdit" />
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

    <!--Modal de Deletar-->

    <modal-component
      id="deletePost"
      :setInfo="objInfo.data"
      :titulo="'Deletar ' + objInfo.title"
      largura="modal-lg"
    >
      <template v-slot:alertText>
        <alert-component
          titleText="Erro ao tentar remover o Evento"
          :msg="fetchDetails"
          tipo="danger"
          v-if="fetchStatus == 'deleteErro'"
        ></alert-component>
        <alert-component
          titleText="Evento Removido!"
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

    <!--Modal de Visualizar-->

    <modal-component
      id="visualizarModal"
      :setInfo="objInfo.data"
      titulo="Visualizar Evento"
      largura="modal-lg"
    >
      <template v-slot:conteudo>
        <div class="container">
          <div class="row mb-3">
            <h5 class="mb-3">Titulo: {{ objInfo.title }}</h5>

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

          <div class="row">
            <label for="localeEventView" class="col form-label">Data</label>
            <label for="testeId1" class="col form-label">Local</label>
          </div>
          <div class="row mb-3">
            <div class="col input-group">
              <span class="input-group-text"
                ><i class="bi bi-calendar2-event"></i
              ></span>
              <input
                type="text"
                class="form-control"
                aria-label="Dollar amount (with dot and two decimal places)"
                disabled
                :value="objInfo.date"
              />
            </div>

            <div class="col input-group">
              <span class="input-group-text"
                ><i class="bi bi-geo-alt"></i
              ></span>
              <input
                type="text"
                id="localeEventView"
                disabled
                :value="objInfo.locale"
                class="form-control"
                aria-label="Dollar amount (with dot and two decimal places)"
              />
            </div>
          </div>
          <div class="row mt-5">
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
            @click="setStore(objInfo)"
            type="button"
            data-bs-toggle="modal"
            data-bs-target="#modalGaleriaEvento"
            class="btn btn-primary"
            data-keyboard="true"
          >
            Visualizar Galeria
          </button>
        </div>
      </template>
    </modal-component>

    <!--Page-->
    <div class="container my-4">
      <div class="row my-3">
        <div class="col-md-7 col-sm-4">
          <h1 class="h1 title-page my-3 my-md-2">
            Eventos<button
              v-if="posts.total"
              data-toggle="tooltip"
              data-placement="top"
              title="Total de Eventos"
              type="button"
              class="btn btn-total btn-primary"
            >
              {{ posts.total }}
            </button>
          </h1>
        </div>
        <div class="col-md-5">
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
          <h2 class="h5">Lista de Eventos</h2>
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
                  <th scope="col">Local</th>
                  <th scope="col">Data do evento</th>
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
                    <td>{{ post.locale }}</td>
                    <td>{{ post.date }}</td>

                    <td>{{ formatDate(post.created_at) }}</td>
                    <td class="btn-tabel">
                      <div class="conatiner">
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
                      </div>
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
              data-bs-target="#modalEvento"
            >
              Novo Evento
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
    urlPosts: "https://goodnine.com.br/api/eventos",
    posts: { data: [] },
    loading: true,
    loader: false,
    errored: false,

    tituloPost: "",
    localPost: "",
    dataPost: "",
    conteudoPost: "",
    imagemPost: [],
    imagemGaleriaPost: [],
    objetoGaleria: [],

    fetchStatus: "",
    fetchDetails: "",
    objInfo: [],
    busca: { id: "", title: "" },
    urlPaginacao: "",
    urlFiltro: "",
  }),

  methods: {
    renderGallery() {},

    timeLocale() {
      let date = new Date();
      console.log(date);
    },
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
      formData.append("locale", obj.locale);
      formData.append("date", obj.date);
      formData.append("content", obj.content);
      if (this.imagemPost[0]) {
        formData.append("thumb", this.imagemPost[0]);
      }
      if (this.imagemGaleriaPost) {
        console.log("Criando o objeto");
        let imagens = this.imagemGaleriaPost;
        for (let i = 0; i < imagens.length; i++) {
          formData.append("gallery[]", imagens[i]);
          console.log(formData.getAll("gallery[]"));
        }
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
            this.clearField();
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
            console.log(errors);
            atualizaformFile.value = "";
          }, 2000);
          this.fetchStatus = !true;
          this.fetchDetails = !true;
        });
    },
    resetContent() {
      this.$refs.myEditor5.setHTML("");
    },

    spinnerButton() {
      this.loader = !false;
      setTimeout(() => {
        this.loader = !true;
      }, 2000);
    },
    clearField() {
      this.tituloPost = "";
      this.localPost = "";
      this.dataPost = "";
      this.conteudoPost = "";
      this.imagemPost = "";
      this.imagemGaleriaPost = [];
      formFileStoreEvent.value = "";
      formFileStoreThumb.value = "";
      atualizaformFile.value = "";
      formFileStoreEventEdit.value = "";
      this.resetContent();
    },
    salvar() {
      let formData = new FormData();
      formData.append("title", this.tituloPost);
      formData.append("locale", this.localPost);
      formData.append("date", this.dataPost);
      formData.append("content", this.conteudoPost);
      formData.append("thumb", this.imagemPost[0]);
      if (this.imagemGaleriaPost) {
        console.log("Criando o objeto");
        let imagens = this.imagemGaleriaPost;
        for (let i = 0; i < imagens.length; i++) {
          formData.append("gallery[]", imagens[i]);
          console.log(formData.getAll("gallery[]"));
        }
      }

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
      let confirma = confirm("Tem certeza que deseja remover este Evento?");
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
        })
        .finally(() => (this.loading = false));
      this.clearField();
    },
    carregarImg(e) {
      if (e.target.files) {
        this.imagemPost = e.target.files;
      }
    },

    carregarImgGaleria(e) {
      if (e.target.files) {
        let file = e.target.files;
        console.log(e.target.files);

        for (let i = 0; i < file.length; i++) {
          this.imagemGaleriaPost.push(file[i]);
        }
      }
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
  