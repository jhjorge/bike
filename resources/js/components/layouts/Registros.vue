<template>
  <div>
    <!--Atualizar-->
    <modal-component
      :setInfo="objInfo.data"
      id="atualizarPost"
      titulo="Atualizar Registro"
    >
      <template v-slot:alertText>
        <alert-component
          titleText="Erro ao tentar atualizar o Registro"
          :msg="fetchDetails"
          tipo="danger"
          v-if="fetchStatus == 'error'"
        ></alert-component>
        <alert-component
          titleText="Registro Atualizado!"
          :msg="fetchDetails"
          tipo="success"
          v-if="fetchStatus == 'atualizado'"
        ></alert-component>
      </template>

      <template v-slot:conteudo>
        <div class="row mb-3">
          <h2>Dados do comprador</h2>
        </div>
        <div class="mb-3 form-group row">
          <div class="col">
            <label for="atualizaTituloPost" class="form-label">Nome</label>
            <input
              v-model="objInfo.nome"
              type="text"
              class="form-control"
              id="atualizaTituloPost"
            />
          </div>
          <div class="col">
            <label for="atualizaemailPost" class="form-label">E-mail</label>
            <input
              v-model="objInfo.email"
              type="text"
              class="form-control"
              id="atualizaemailPost"
            />
          </div>
        </div>
        <div class="mb-3 form-group row">
          <div class="col">
            <label for="atualizaTelefonePost" class="form-label"
              >Telefone</label
            >
            <input
              v-model="objInfo.telefone"
              type="text"
              class="form-control"
              id="atualizaTelefonePost"
            />
          </div>
          <div class="col">
            <label for="atualizaDocumentoPost" class="form-label"
              >Documento</label
            >
            <input
              v-model="objInfo.documento"
              type="text"
              class="form-control"
              id="atualizaDocumentoPost"
            />
          </div>
        </div>
        <div class="mb-3 form-group row">
          <div class="col-6">
            <label for="atualizaRuaPost" class="form-label">Rua</label>
            <input
              v-model="objInfo.rua"
              type="text"
              class="form-control"
              id="atualizaRuaPost"
            />
          </div>
          <div class="col-3">
            <label for="atualizaBairroPost" class="form-label">Bairro</label>
            <input
              v-model="objInfo.bairro"
              type="text"
              class="form-control"
              id="atualizaBairroPost"
            />
          </div>
          <div class="col-3">
            <label for="atualizaNumeroPost" class="form-label">Número</label>
            <input
              v-model="objInfo.numero"
              type="text"
              class="form-control"
              id="atualizaNumeroPost"
            />
          </div>
        </div>
        <div class="mb-3 form-group row">
          <div class="col">
            <label for="atualizaCidadePost" class="form-label">Cidade</label>
            <input
              v-model="objInfo.cidade"
              type="text"
              class="form-control"
              id="atualizaCidadePost"
            />
          </div>
          <div class="col">
            <label for="atualizaEstadoPost" class="form-label">Estado</label>
            <input
              v-model="objInfo.estado"
              type="text"
              class="form-control"
              id="atualizaEstadoPost"
            />
          </div>
        </div>
        <div class="mb-3 form-group row">
          <div class="col">
            <label for="atualizaCepPost" class="form-label">CEP</label>
            <input
              v-model="objInfo.cep"
              type="text"
              class="form-control"
              id="atualizaCepPost"
            />
          </div>
          <div class="col">
            <label for="atualizaNascimentoPost" class="form-label"
              >Data de Nascimento</label
            >
            <input
              v-model="objInfo.nascimento"
              type="text"
              class="form-control"
              id="atualizaNascimentoPost"
            />
          </div>
        </div>
        <div class="row mb-3">
          <h2>Dados da Bike</h2>
        </div>
        <div class="mb-3 form-group row">
          <div class="col">
            <label for="atualizaModeloBikePost" class="form-label"
              >Modelo da Bike</label
            >
            <input
              v-model="objInfo.modelo_bike"
              type="text"
              class="form-control"
              id="atualizaModeloBikePost"
            />
          </div>
          <div class="col">
            <label for="atualizaNumeeroSeriePost" class="form-label"
              >Número de Série</label
            >
            <input
              v-model="objInfo.numero_serie"
              type="text"
              class="form-control"
              id="atualizaNumeroSeriePost"
            />
          </div>
        </div>
        <div class="mb-3 form-group row">
          <div class="col">
            <label for="atualizaNotaFiscalPost" class="form-label"
              >Nota Fiscal</label
            >
            <input
              v-model="objInfo.nota_fiscal"
              type="text"
              class="form-control"
              id="atualizaNotaFiscalPost"
            />
          </div>
          <div class="col">
            <label for="atualizaNomeRevendaPost" class="form-label"
              >Nome da Revenda</label
            >
            <input
              v-model="objInfo.nome_revenda"
              type="text"
              class="form-control"
              id="atualizaNomeRevendaPost"
            />
          </div>
          <div class="col">
            <label for="atualizaDataCompraPost" class="form-label"
              >Data da compra</label
            >
            <input
              v-model="objInfo.data_compra"
              type="text"
              class="form-control"
              id="atualizaDataCompraPost"
            />
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

    <!--Deletar-->

    <modal-component
      id="deletePost"
      :setInfo="objInfo.data"
      titulo="Deletar Registro"
    >
      <template v-slot:alertText>
        <alert-component
          titleText="Erro ao tentar remover o Registro"
          :msg="fetchDetails"
          tipo="danger"
          v-if="fetchStatus == 'deleteErro'"
        ></alert-component>
        <alert-component
          titleText="Registro Removido!"
          :msg="fetchDetails"
          tipo="success"
          v-if="fetchStatus == 'removido'"
        ></alert-component>
      </template>

      <template v-slot:conteudo>
        <div class="row mb-3">
          <h2>Dados do comprador</h2>
        </div>
        <div class="mb-3 form-group row">
          <div class="col">
            <label for="atualizaTituloPost" class="form-label">Nome</label>
            <input
              disabled
              v-model="objInfo.nome"
              type="text"
              class="form-control"
              id="atualizaTituloPost"
            />
          </div>
          <div class="col">
            <label for="atualizaemailPost" class="form-label">E-mail</label>
            <input
              disabled
              v-model="objInfo.email"
              type="text"
              class="form-control"
              id="atualizaemailPost"
            />
          </div>
        </div>
        <div class="mb-3 form-group row">
          <div class="col">
            <label for="atualizaTelefonePost" class="form-label"
              >Telefone</label
            >
            <input
              disabled
              v-model="objInfo.telefone"
              type="text"
              class="form-control"
              id="atualizaTelefonePost"
            />
          </div>
          <div class="col">
            <label for="atualizaDocumentoPost" class="form-label"
              >Documento</label
            >
            <input
              disabled
              v-model="objInfo.documento"
              type="text"
              class="form-control"
              id="atualizaDocumentoPost"
            />
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

    <!--Visualizar-->

    <modal-component
      id="visualizarModal"
      :setInfo="objInfo.data"
      titulo="Visualizar Registro"
    >
      <template v-slot:conteudo>
        <div class="row mb-3">
          <h2>Dados do comprador</h2>
        </div>
        <div class="mb-3 form-group row">
          <div class="col">
            <label for="atualizaTituloPost" class="form-label">Nome</label>
            <input
              disabled
              v-model="objInfo.nome"
              type="text"
              class="form-control"
              id="atualizaTituloPost"
            />
          </div>
          <div class="col">
            <label for="atualizaemailPost" class="form-label">E-mail</label>
            <input
              disabled
              v-model="objInfo.email"
              type="text"
              class="form-control"
              id="atualizaemailPost"
            />
          </div>
        </div>
        <div class="mb-3 form-group row">
          <div class="col">
            <label for="atualizaTelefonePost" class="form-label"
              >Telefone</label
            >
            <input
              disabled
              v-model="objInfo.telefone"
              type="text"
              class="form-control"
              id="atualizaTelefonePost"
            />
          </div>
          <div class="col">
            <label for="atualizaDocumentoPost" class="form-label"
              >Documento</label
            >
            <input
              disabled
              v-model="objInfo.documento"
              type="text"
              class="form-control"
              id="atualizaDocumentoPost"
            />
          </div>
        </div>
        <div class="mb-3 form-group row">
          <div class="col-6">
            <label for="atualizaRuaPost" class="form-label">Rua</label>
            <input
              disabled
              v-model="objInfo.rua"
              type="text"
              class="form-control"
              id="atualizaRuaPost"
            />
          </div>
          <div class="col-3">
            <label for="atualizaBairroPost" class="form-label">Bairro</label>
            <input
              disabled
              v-model="objInfo.bairro"
              type="text"
              class="form-control"
              id="atualizaBairroPost"
            />
          </div>
          <div class="col-3">
            <label for="atualizaNumeroPost" class="form-label">Número</label>
            <input
              disabled
              v-model="objInfo.numero"
              type="text"
              class="form-control"
              id="atualizaNumeroPost"
            />
          </div>
        </div>
        <div class="mb-3 form-group row">
          <div class="col">
            <label for="atualizaCidadePost" class="form-label">Cidade</label>
            <input
              disabled
              v-model="objInfo.cidade"
              type="text"
              class="form-control"
              id="atualizaCidadePost"
            />
          </div>
          <div class="col">
            <label for="atualizaEstadoPost" class="form-label">Estado</label>
            <input
              disabled
              v-model="objInfo.estado"
              type="text"
              class="form-control"
              id="atualizaEstadoPost"
            />
          </div>
        </div>
        <div class="mb-3 form-group row">
          <div class="col">
            <label for="atualizaCepPost" class="form-label">CEP</label>
            <input
              disabled
              v-model="objInfo.cep"
              type="text"
              class="form-control"
              id="atualizaCepPost"
            />
          </div>
          <div class="col">
            <label for="atualizaNascimentoPost" class="form-label"
              >Data de Nascimento</label
            >
            <input
              disabled
              v-model="objInfo.nascimento"
              type="text"
              class="form-control"
              id="atualizaNascimentoPost"
            />
          </div>
        </div>
        <div class="row mb-3">
          <h2>Dados da Bike</h2>
        </div>
        <div class="mb-3 form-group row">
          <div class="col">
            <label for="atualizaModeloBikePost" class="form-label"
              >Modelo da Bike</label
            >
            <input
              disabled
              v-model="objInfo.modelo_bike"
              type="text"
              class="form-control"
              id="atualizaModeloBikePost"
            />
          </div>
          <div class="col">
            <label for="atualizaNumeeroSeriePost" class="form-label"
              >Número de Série</label
            >
            <input
              disabled
              v-model="objInfo.numero_serie"
              type="text"
              class="form-control"
              id="atualizaNumeroSeriePost"
            />
          </div>
        </div>
        <div class="mb-3 form-group row">
          <div class="col">
            <label for="atualizaNotaFiscalPost" class="form-label"
              >Nota Fiscal</label
            >
            <input
              disabled
              v-model="objInfo.nota_fiscal"
              type="text"
              class="form-control"
              id="atualizaNotaFiscalPost"
            />
          </div>
          <div class="col">
            <label for="atualizaNomeRevendaPost" class="form-label"
              >Nome da Revenda</label
            >
            <input
              disabled
              v-model="objInfo.nome_revenda"
              type="text"
              class="form-control"
              id="atualizaNomeRevendaPost"
            />
          </div>
          <div class="col">
            <label for="atualizaDataCompraPost" class="form-label"
              >Data da compra</label
            >
            <input
              disabled
              v-model="objInfo.data_compra"
              type="text"
              class="form-control"
              id="atualizaDataCompraPost"
            />
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
        <div class="col-md-4 col-sm-4">
          <h1 class="h1 title-page my-3 my-md-2">
            Registros<button
              v-if="posts.total"
              data-toggle="tooltip"
              data-placement="top"
              title="Total de Registros"
              type="button"
              class="btn btn-total btn-primary"
            >
              {{ posts.total }}
            </button>
          </h1>
        </div>
        <div class="col-md-8 p-2">
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
                        <div class="input-group-text">Nome</div>
                      </div>
                      <input
                        type="text"
                        class="form-control"
                        id="tituloBuscaPost"
                        v-model="busca.nome"
                      />
                    </div>
                  </div>
                </div>
                <div class="form-row row">
                  <div class="col-md-6 my-1">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">E-mail</div>
                      </div>
                      <input
                        type="text"
                        class="form-control"
                        id="idBuscaPost"
                        v-model="busca.email"
                      />
                    </div>
                  </div>
                  <div class="col-md-6 my-1">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Telefone</div>
                      </div>
                      <input
                        type="text"
                        class="form-control"
                        id="tituloBuscaPost"
                        v-model="busca.telefone"
                      />
                    </div>
                  </div>
                </div>
                <div class="form-row row">
                  <div class="col-md-9 my-1">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Cidade</div>
                      </div>
                      <input
                        type="text"
                        class="form-control"
                        id="idBuscaPost"
                        v-model="busca.cidade"
                      />
                    </div>
                  </div>
                  <div class="col-md-3 my-1">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Estado</div>
                      </div>
                      <input
                        type="text"
                        class="form-control"
                        id="tituloBuscaPost"
                        v-model="busca.estado"
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
          <h2 class="h5">Lista de Registros</h2>
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
                  <th scope="col">Nome</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Cidade</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Data de criação</th>
                  <th scope="col"></th>
                </template>
                <template v-slot:conteudo>
                  <tr v-for="post in posts.data" :key="post.id">
                    <th>{{ post.id }}</th>
                    <td>{{ post.nome }}</td>
                    <td>{{ post.email }}</td>
                    <td>{{ post.telefone }}</td>
                    <td>{{ post.cidade }}</td>
                    <td>{{ post.estado }}</td>

                    <td>{{ formatDate(post.created_at) }}</td>
                    <td class="btn-tabela">
                      <div class="btn-group">
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
  name: "Registros",
  component: { Modal },

  data: () => ({
    urlPosts: "https://goodnine.com.br/api/registros",
    posts: { data: [] },
    loading: true,
    loader: false,
    errored: false,
    tituloPost: null,
    conteudoPost: null,
    imagemPost: [],
    fetchStatus: null,
    fetchDetails: null,
    objInfo: { data: [] },
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
            filtro += chave + ":like:" + this.busca[chave] + "%";
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
      formData.append("nome", obj.nome);
      formData.append("email", obj.email);
      formData.append("telefone", obj.telefone);
      formData.append("documento", obj.documento);
      formData.append("rua", obj.rua);
      formData.append("bairro", obj.bairro);
      formData.append("numero", obj.numero);
      formData.append("cidade", obj.cidade);
      formData.append("estado", obj.estado);
      formData.append("cep", obj.cep);
      formData.append("nascimento", obj.nascimento);
      formData.append("modelo_bike", obj.modelo_bike);
      formData.append("numero_serie", obj.numero_serie);
      formData.append("nota_fiscal", obj.nota_fiscal);
      formData.append("nome_revenda", obj.nome_revenda);
      formData.append("data_compra", obj.data_compra);

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
    },

    removePost(obj) {
      let confirma = confirm("Tem certeza que deseja remover este Registro?");
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
          this.urlPosts = "https://goodnine.com.br/api/registros";
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
  