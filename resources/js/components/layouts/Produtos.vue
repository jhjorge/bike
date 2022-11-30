<template>
  <!--Modal de Criação -->
  <div>
    <modal-component id="modalEvento" titulo="Adicionar Produto">
      <template v-slot:alertText>
        <alert-component
          titleText="Erro ao tentar cadastrar o Produto"
          :msg="fetchDetails"
          tipo="danger"
          v-if="fetchStatus == 'erro'"
        ></alert-component>
        <alert-component
          titleText="Produto Criado!"
          :msg="fetchDetails"
          tipo="success"
          v-if="fetchStatus == 'criado'"
        ></alert-component>
      </template>
      <template v-slot:conteudo>
        <div class="mb-3">
          <label for="tituloEventoModal" class="form-label"
            >Nome do Produto</label
          >
          <input
            v-model="tituloPost"
            type="text"
            class="form-control"
            id="tituloEventoModal"
          />
        </div>
        <div class="row mb-3">
          <div class="col">
            <label class="form-label" for="tamanhoPostCreate">Tamanho</label>

            <input
              v-model="tamanhoPost"
              type="input"
              id="tamanhoPostCreate"
              class="mb-3 form-control"
            />
          </div>
          <div class="col">
            <label class="form-label" for="meeting-time">Cor</label>

            <input
              v-model="corPost"
              type="input"
              id="meeting-time"
              class="mb-3 form-control"
            />
          </div>
        </div>

        <div class="mb-3">
          <label for="selectCategory" class="form-label">Catgeoria</label>
          <select
            id="selectCategory"
            class="form-select"
            aria-label="Selecione Uma categoria"
            v-model="categoriaPost"
          >
            <option default disabled>Selecione uma Categoria</option>
            <option value="1">Acessórios</option>
            <option value="2">Componentes</option>
            <option value="3">Vestuário</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="conteudoPostModal" class="form-label"
            >Descrição do Produto</label
          >
          <textarea
            v-model="descricaoPost"
            class="form-control"
            id="conteudoPostModalThumb"
            rows="4"
          ></textarea>
        </div>
        <div class="mb-3">
          <label for="conteudoPostModal" class="form-label"
            >Conteudo do Produto</label
          >
          <textarea
            v-model="conteudoPost"
            class="form-control"
            id="conteudoPostModalThumb"
            rows="4"
          ></textarea>
        </div>
        <div class="mb-3">
          <label for="conteudoPostModal" class="form-label">Obervação</label>
          <textarea
            v-model="observacaoPost"
            class="form-control"
            id="conteudoPostModalThumb"
            rows="3"
          ></textarea>
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
      titulo="Atualizar Produto"
    >
      <template v-slot:alertText>
        <alert-component
          titleText="Erro ao tentar atualizar o Produto"
          :msg="fetchDetails"
          tipo="danger"
          v-if="fetchStatus == 'error'"
        ></alert-component>
        <alert-component
          titleText="Produto Atualizado!"
          :msg="fetchDetails"
          tipo="success"
          v-if="fetchStatus == 'atualizado'"
        ></alert-component>
      </template>

      <template v-slot:conteudo>
        <div class="mb-3">
          <label for="tituloEventoModal" class="form-label"
            >Nome do Produto</label
          >
          <input
            v-model="objInfo.title"
            type="text"
            class="form-control"
            id="tituloEventoModal"
          />
        </div>
        <div class="row mb-3">
          <div class="col">
            <label class="form-label" for="tamanhoPostCreate">Tamanho</label>

            <input
              v-model="objInfo.tamanho"
              type="input"
              id="tamanhoPostCreate"
              class="mb-3 form-control"
            />
          </div>
          <div class="col">
            <label class="form-label" for="meeting-time">Cor</label>

            <input
              v-model="objInfo.cor"
              type="input"
              id="meeting-time"
              class="mb-3 form-control"
            />
          </div>
        </div>

        <div class="mb-3">
          <label for="selectCategory" class="form-label">Catgeoria</label>
          <select
            id="selectCategory"
            class="form-select"
            aria-label="Selecione Uma categoria"
            v-model="objInfo.categoria_id"
          >
            <option default disabled>Selecione uma Categoria</option>
            <option value="1">Acessórios</option>
            <option value="2">Componentes</option>
            <option value="3">Vestuário</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="conteudoPostModal" class="form-label"
            >Descrição do Produto</label
          >
          <textarea
            v-model="objInfo.descricao"
            class="form-control"
            id="conteudoPostModalThumb"
            rows="4"
          ></textarea>
        </div>
        <div class="mb-3">
          <label for="conteudoPostModal" class="form-label"
            >Conteudo do Produto</label
          >
          <textarea
            v-model="objInfo.content"
            class="form-control"
            id="conteudoPostModalThumb"
            rows="4"
          ></textarea>
        </div>
        <div class="mb-3">
          <label for="conteudoPostModal" class="form-label">Obervação</label>
          <textarea
            v-model="objInfo.observacao"
            class="form-control"
            id="conteudoPostModalThumb"
            rows="3"
          ></textarea>
        </div>
        <div class="mb-3">
          <label for="formFileStore" class="form-label"
            >Imagem de Destaque</label
          >
          <input @change="carregarImg($event)" class="form-control"
          accept=”image/*” type="file" id="atualizaformProductFile" />
        </div>
        <div class="mb-3">
          <label for="formFileStoreEvent" class="form-label"
            >Galeria de fotos</label
          >
          <input @change="carregarImgGaleria($event)" class="form-control"
          type="file" accept=”image/*” multiple id="formFileStoreProductEdit" />
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
    >
      <template v-slot:alertText>
        <alert-component
          titleText="Erro ao tentar remover o Produto"
          :msg="fetchDetails"
          tipo="danger"
          v-if="fetchStatus == 'deleteErro'"
        ></alert-component>
        <alert-component
          titleText="Produto Removido!"
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
            <label for="ContentInfo" class="label form-label">Conteudo:</label>
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

    <!--Modal de Visualizar-->

    <modal-component
      id="visualizarModal"
      :setInfo="objInfo.data"
      titulo="Visualizar Produto"
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
            <textarea
              id="ContentInfo"
              disabled
              :value="objInfo.content"
              rows="4"
              v-if="objInfo.content"
            ></textarea>
          </div>
          <div class="row mb-3">
            <label for="ContentInfo" class="label form-label">Descrição</label>
            <textarea
              id="ContentInfo"
              disabled
              :value="objInfo.descricao"
              rows="4"
              v-if="objInfo.descricao"
            ></textarea>
          </div>
          <div class="row mb-3">
            <label for="ContentInfo" class="label form-label">Observação</label>
            <textarea
              id="ContentInfo"
              disabled
              :value="objInfo.observacao"
              rows="3"
              v-if="objInfo.observacao"
            ></textarea>
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
            Produtos<button
              v-if="posts.total"
              data-toggle="tooltip"
              data-placement="top"
              title="Total de Produtos"
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
          <h2 class="h5">Lista de Produtos</h2>
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
                  <th scope="col">Nome do Produto</th>
                  <th scope="col">Imagem</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Data de criação</th>
                  <th scope="col">Data de atualização</th>
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
                    <td>
                      {{ categoriaView(post.categoria_id) }}
                    </td>

                    <td>{{ formatDate(post.created_at) }}</td>
                    <td>{{ formatDate(post.updated_at) }}</td>
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
              Novo Produto
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
  name: "Produtos",
  component: { Modal },

  data: () => ({
    urlPosts: "https://goodnine.com.br/api/produtos",
    posts: { data: [] },
    loading: true,
    loader: false,
    errored: false,

    tituloPost: "",
    catgeoriaPost: "",
    tamanhoPost: "",
    corPost: "",
    descricaoPost: "",
    observacaoPost: "",
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
    categoriaView(obj) {
      if (obj !== null) {
        if (obj == 1) {
          return "Acessórios";
        }
        if (obj == 2) {
          return "Componentes";
        } else {
          return "Vestuário";
        }
      }
    },

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
      formData.append("categoria_id", obj.categoria_id);
      formData.append("tamanho", obj.tamanho);
      formData.append("cor", obj.cor);
      formData.append("descricao", obj.descricao);
      formData.append("observacao", obj.observacao);
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

    spinnerButton() {
      this.loader = !false;
      setTimeout(() => {
        this.loader = !true;
      }, 2000);
    },
    clearField() {
      this.tituloPost = "";
      this.categoriaPost = "";
      this.tamanhoPost = "";
      this.corPost = "";
      this.observacaoPost = "";
      this.descricaoPost = "";
      this.conteudoPost = "";
      this.imagemPost = "";
      this.imagemGaleriaPost = [];
      formFileStoreEvent.value = "";
      formFileStoreThumb.value = "";
      atualizaformProductFile.value = "";
      formFileStoreProductEdit.value = "";
    },
    salvar() {
      let formData = new FormData();
      formData.append("title", this.tituloPost);
      formData.append("categoria_id", this.categoriaPost);
      formData.append("tamanho", this.tamanhoPost);
      formData.append("cor", this.corPost);
      formData.append("observacao", this.observacaoPost);
      formData.append("descricao", this.descricaoPost);
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
            console.log(erros);
          }, 200);
          this.fetchStatus = null;
          this.fetchDetails = null;
        });
    },
    removePost(obj) {
      let confirma = confirm("Tem certeza que deseja remover este Produto?");
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
    },
    carregarImg(e) {
      if (e.target.files) {
        this.imagemPost = e.target.files;
      }
    },

    carregarImgGaleria(e) {
      if (e.target.files) {
        let file = e.target.files;
        this.imagemGaleriaPost = [];

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
  