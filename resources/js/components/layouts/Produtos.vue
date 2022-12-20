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
        <div class="mb-3">
          <label for="conteudoPostModal" class="form-label">Tamanho</label>
          <div class="card p-2">
            <ul class="row">
              <li class="col" v-for="item in tamanhoPost" :key="item.id">
                <button
                  type="button"
                  class="btn btn-sm btn-primary m-1 position-relative"
                  @click.prevent="removerTamanho(item)"
                >
                  {{ item.tamanho }}
                  <span
                    class="
                      position-absolute
                      top-0
                      start-100
                      translate-middle
                      p-1
                      bg-danger
                      border border-light
                      rounded-circle
                    "
                    style="font-size: 0.5rem"
                  >
                    X
                  </span>
                </button>
              </li>
            </ul>
          </div>
          <div class="input-group mb-3 mt-1">
            <input
              type="text"
              v-model="tamanhoTemp"
              class="form-control"
              id="tamahoTempProdutos"
              placeholder="Incluir tamanho"
              aria-label="Incluir tamanho"
              aria-describedby="basic-addon2"
            />
            <div class="input-group-append btn-group" role="group">
              <button
                class="btn btn-sm btn-primary col"
                @click.prevent="inclurTamanho(tamanhoTemp)"
                type="button"
              >
                Adicionar
              </button>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="conteudoPostModal" class="form-label">Cor</label>
          <div class="card p-2">
            <ul class="row">
              <li class="col" v-for="item in corPost" :key="item.id">
                <button
                  type="button"
                  class="btn btn-sm btn-primary m-1 position-relative"
                  @click.prevent="removerCor(item)"
                >
                  {{ item.cor }}
                  <span
                    class="
                      position-absolute
                      top-0
                      start-100
                      translate-middle
                      p-1
                      bg-danger
                      border border-light
                      rounded-circle
                    "
                    style="font-size: 0.5rem"
                  >
                    X
                  </span>
                </button>
              </li>
            </ul>
          </div>
          <div class="input-group mb-3 mt-1">
            <input
              type="text"
              v-model="corTemp"
              class="form-control"
              id="tamahoTempProdutos"
              placeholder="Incluir Cor"
              aria-label="Incluir Cor"
              aria-describedby="basic-addon2"
            />
            <div class="input-group-append btn-group" role="group">
              <button
                class="btn btn-sm btn-primary col"
                @click.prevent="inclurCor(corTemp)"
                type="button"
              >
                Adicionar
              </button>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="selectCategory" class="form-label">Categeoria</label>
          <select
            id="selectCategory"
            class="form-select"
            aria-label="Selecione Uma categoria"
            :value="categoriaPost"
            v-model="categoriaPost"
          >
            <option value="" disabled>Selecione uma Categoria</option>
            <option value="1">Acessórios</option>
            <option value="2">Componentes</option>
            <option value="3">Vestuário</option>
          </select>
        </div>

        <div class="mb-3">
          <div v-if="msgDescri">
            <div class="alert alert-danger" role="alert">
              Os campos titulo e descrição devem ser preenchidos!
            </div>
          </div>
          <div v-if="msg">
            <div class="alert alert-success" role="alert">
              Descrição adicionada!
            </div>
          </div>
          <label for="conteudoPostModal" class="form-label"
            >Descrição do Produto</label
          >
          <div class="row">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Titulo</span>
              <input
                type="text"
                class="form-control"
                v-model="tituloTemp"
                aria-describedby="basic-addon1"
              />
            </div>
          </div>
          <QuillEditor
            theme="snow"
            toolbar="essential"
            v-model:content="descricaoTemp"
            contentType="html"
            id="descricaoProdu"
          />

          <input
            class="btn btn-primary my-2"
            type="submit"
            value="Inclur Descrição"
            @click.prevent="incluirDescricao(tituloTemp, descricaoTemp)"
          />
          <button
            type="button"
            class="btn mx-md-1 mt-2 mt-md-0 btn-secondary"
            data-bs-toggle="modal"
            data-bs-target="#modalDescricoes"
          >
            Visualizar Descrições
          </button>
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
    <!--Modal Conteudo-->
    <modal-component
      id="modalDescricoes"
      titulo="Descrições"
      largura="modal-lg"
    >
      <template v-slot:conteudo v-if="descricaoPost">
        <div class="col" v-for="(item, index) in descricaoPost" :key="index">
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <span
                class="
                  position-absolute
                  top-1
                  start-80
                  translate-middle
                  p-1
                  btn btn-primary btn-sm
                  border border-light
                  rounded-circle
                "
                @click="removeDescricao(index)"
                style="font-size: 0.5rem; z-index: 2"
              >
                X
              </span>
              <h2 class="accordion-header" id="headingOne">
                <button
                  class="accordion-button"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseOne"
                  aria-expanded="true"
                  aria-controls="collapseOne"
                >
                  {{ JSON.parse(item).titulo }}
                </button>
              </h2>

              <div
                id="collapseOne"
                class="accordion-collapse collapse"
                aria-labelledby="headingOne"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body container">
                  <span v-html="JSON.parse(item).conteudo"> </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button
            class="btn btn-primary"
            data-bs-target="#modalEvento"
            data-bs-toggle="modal"
            data-bs-dismiss="modal"
          >
            Voltar
          </button>
        </div>
      </template>
    </modal-component>
    <!--Modal ConteudoItem-->
    <modal-component
      id="modalDescricoesItem"
      titulo="Descrições"
      :setInfo="objInfo.data"
      largura="modal-lg"
    >
      <template v-slot:conteudo v-if="objInfo.descricao">
        <div
          class="col"
          v-for="(item, index) in objInfo.descricao"
          :key="index"
        >
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <span
                class="
                  position-absolute
                  top-1
                  start-80
                  translate-middle
                  p-1
                  btn btn-primary btn-sm
                  border border-light
                  rounded-circle
                "
                @click="removerAtualiza2(objInfo.descricao, index)"
                style="font-size: 0.5rem; z-index: 2"
              >
                X
              </span>
              <h2 class="accordion-header" id="headingOne">
                <button
                  class="accordion-button"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseOne"
                  aria-expanded="true"
                  aria-controls="collapseOne"
                  v-if="item"
                >
                  {{ JSON.parse(item).titulo }}
                </button>
              </h2>

              <div
                id="collapseOne"
                class="accordion-collapse collapse"
                aria-labelledby="headingOne"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body container" v-if="item">
                  <span v-html="JSON.parse(item).conteudo"> </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button
            class="btn btn-primary text-center"
            data-bs-target="#atualizarPost"
            data-bs-toggle="modal"
            data-bs-dismiss="modal"
          >
            Voltar
          </button>
        </div>
      </template>
    </modal-component>
    <!--Modal ConteudoItem2-->
    <modal-component
      id="modalDescricoesItem2"
      titulo="Descrições"
      :setInfo="objInfo.data"
      largura="modal-lg"
    >
      <template v-slot:conteudo v-if="objInfo.descricao">
        <div
          class="col"
          v-for="(item, index) in objInfo.descricao"
          :key="index"
        >
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button
                  class="accordion-button"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseOne"
                  aria-expanded="true"
                  aria-controls="collapseOne"
                  v-if="item"
                >
                  {{ JSON.parse(item).titulo }}
                </button>
              </h2>

              <div
                id="collapseOne"
                class="accordion-collapse collapse"
                aria-labelledby="headingOne"
                data-bs-parent="#accordionExample"
              >
                <div class="accordion-body container">
                  <span v-html="JSON.parse(item).conteudo" v-if="item"> </span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-primary"
              data-bs-target="#visualizarModal"
              data-bs-toggle="modal"
              data-bs-dismiss="modal"
            >
              Voltar
            </button>
          </div>
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
        <div class="mb-3">
          <label for="conteudoPostModal" class="form-label">Tamanho</label>
          <div class="card p-2">
            <ul class="row">
              <li
                class="col"
                v-for="(item, index) in objInfo.tamanho"
                :key="index"
              >
                <button
                  type="button"
                  class="btn btn-sm btn-primary m-1 position-relative"
                  @click.prevent="removerAtualiza(objInfo.tamanho, index)"
                >
                  {{ item }}
                  <span
                    class="
                      position-absolute
                      top-0
                      start-100
                      translate-middle
                      p-1
                      bg-danger
                      border border-light
                      rounded-circle
                    "
                    style="font-size: 0.5rem"
                  >
                    X
                  </span>
                </button>
              </li>
            </ul>
          </div>
          <div class="input-group mb-3 mt-1">
            <input
              type="text"
              v-model="tamanhoTemp"
              class="form-control"
              id="tamahoTempProdutos"
              placeholder="Incluir tamanho"
              aria-label="Incluir tamanho"
              aria-describedby="basic-addon2"
            />
            <div class="input-group-append btn-group" role="group">
              <button
                class="btn btn-sm btn-primary col"
                @click.prevent="inclurAtualiza(tamanhoTemp, objInfo.tamanho)"
                type="button"
              >
                Adicionar
              </button>
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="conteudoPostModal" class="form-label">Cor</label>
          <div class="card p-2">
            <ul class="row">
              <li class="col" v-for="(item, index) in objInfo.cor" :key="index">
                <button
                  type="button"
                  class="btn btn-sm btn-primary m-1 position-relative"
                  @click.prevent="removerAtualiza(objInfo.cor, index)"
                >
                  {{ item }}
                  <span
                    class="
                      position-absolute
                      top-0
                      start-100
                      translate-middle
                      p-1
                      bg-danger
                      border border-light
                      rounded-circle
                    "
                    style="font-size: 0.5rem"
                  >
                    X
                  </span>
                </button>
              </li>
            </ul>
          </div>
          <div class="input-group mb-3 mt-1">
            <input
              type="text"
              v-model="corTemp"
              class="form-control"
              id="tamahoTempProdutos"
              placeholder="Incluir Cor"
              aria-label="Incluir Cor"
              aria-describedby="basic-addon2"
            />
            <div class="input-group-append btn-group" role="group">
              <button
                class="btn btn-sm btn-primary col"
                @click.prevent="inclurAtualiza(corTemp, objInfo.cor)"
                type="button"
              >
                Adicionar
              </button>
            </div>
          </div>
        </div>

        <div class="mb-3" v-if="objInfo.categoria_id">
          <label for="selectCategory" class="form-label">Categeoria: </label>
          <select
            id="selectCategory"
            class="form-select"
            aria-label="Selecione Uma categoria"
            :value="objInfo.categoria_id"
            v-model="objInfo.categoria_id"
          >
            <option value="1">Acessórios</option>
            <option value="2">Componentes</option>
            <option value="3">Vestuário</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="conteudoPostModal" class="form-label"
            >Descrição do Produto</label
          >
          <div class="row">
            <div v-if="msgDescri">
              <div class="alert alert-danger" role="alert">
                Os campos titulo e descrição devem ser preenchidos!
              </div>
            </div>

            <div v-if="msg">
              <div class="alert alert-success" role="alert">
                Descrição adicionada!
              </div>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Titulo</span>
              <input
                type="text"
                class="form-control"
                v-model="tituloTemp"
                aria-describedby="basic-addon1"
              />
            </div>
          </div>
          <QuillEditor
            theme="snow"
            toolbar="essential"
            v-model:content="descricaoTemp"
            contentType="html"
            id="descricaoProdu"
          />
          <input
            class="btn btn-primary my-2"
            type="submit"
            value="Inclur Descrição"
            @click.prevent="
              incluirDescricaoAtualiza(
                tituloTemp,
                descricaoTemp,
                objInfo.descricao
              )
            "
          />
          <button
            data-bs-toggle="modal"
            data-bs-target="#modalDescricoesItem"
            data-keyboard="true"
            class="btn mx-md-1 mt-2 mt-md-0 btn-secondary"
            @click="setStore(objInfo)"
          >
            Visualizar Descrições
          </button>
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
          <div class="mb-3">
            <label for="tituloEventoModal" class="form-label"
              >Nome do Produto</label
            >
            <input
              v-model="objInfo.title"
              disabled
              type="text"
              class="form-control"
              id="tituloEventoModal"
            />
          </div>
          <div class="mb-3">
            <label for="conteudoPostModal" class="form-label">Tamanho</label>
            <div class="card p-2">
              <ul class="row">
                <li
                  class="col"
                  v-for="(item, index) in objInfo.tamanho"
                  :key="index"
                >
                  <span class="badge bg-primary">{{ item }}</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="mb-3">
            <label for="conteudoPostModal" class="form-label">Cor</label>
            <div class="card p-2">
              <ul class="row">
                <li
                  class="col"
                  v-for="(item, index) in objInfo.cor"
                  :key="index"
                >
                  <span class="badge bg-primary">{{ item }}</span>
                </li>
              </ul>
            </div>
          </div>

          <div class="mb-3">
            <label for="selectCategory" class="form-label"
              >Categoria Atual:
              <b>{{ categoriaView(objInfo.categoria_id) }}</b></label
            >
          </div>
          <div>
            <button
              data-bs-toggle="modal"
              data-bs-target="#modalDescricoesItem2"
              data-keyboard="true"
              class="btn mx-md-1 mt-2 mt-md-0 btn-secondary"
              @click="setStore(objInfo)"
            >
              Visualizar Descrições
            </button>
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
    descricaoTemp: "",
    descricaoPost: [],
    tituloTemp: "",

    tamanhoTemp: "",
    corTemp: "",

    tituloPost: "",
    catgeoriaPost: "",
    tamanhoPost: [],
    corPost: [],
    imagemPost: [],
    imagemGaleriaPost: [],
    objetoGaleria: [],
    msg: false,
    msgDescri: false,

    fetchStatus: "",
    fetchDetails: "",
    objInfo: [],
    busca: { id: "", title: "" },
    urlPaginacao: "",
    urlFiltro: "",
  }),

  methods: {
    incluirDescricao(title, descri) {
      if (title && descri) {
        this.descricaoPost.push(
          JSON.stringify({ titulo: title, conteudo: descri })
        );
        this.tituloTemp = "";
        this.descricaoTemp = "";
        this.clearField;
        this.msg = !this.msg;
        setTimeout(() => {
          this.msg = false;
        }, 2000);
      } else {
        this.msgDescri = !this.msgDescri;
        setTimeout(() => {
          this.msgDescri = false;
        }, 2000);
      }
    },
    incluirDescricaoAtualiza(title, descri, obj) {
      if (title && descri) {
        obj.push(JSON.stringify({ titulo: title, conteudo: descri }));
        this.tituloTemp = "";
        this.descricaoTemp = "";
        this.clearField;
        this.msg = !this.msg;
        setTimeout(() => {
          this.msg = false;
        }, 2000);
      } else {
        this.msgDescri = !this.msgDescri;
        setTimeout(() => {
          this.msgDescri = false;
        }, 2000);
      }
    },
    removerAtualiza2(obj1, obj2) {
      if (obj1) {
        obj1.splice(obj2, 1);
      }
    },

    removerTamanho(obj) {
      if (obj) {
        this.tamanhoPost.splice(this.tamanhoPost.indexOf(obj), 1);
      }
    },
    removerAtualiza(obj, indice) {
      if (obj) {
        obj.splice(indice, 1);
      }
    },
    removeDescricao(indice) {
      if (this.descricaoPost) {
        this.descricaoPost.splice(indice, 1);
      }
    },
    removerCor(obj) {
      if (obj) {
        this.corPost.splice(this.corPost.indexOf(obj), 1);
      }
    },

    inclurAtualiza(item, obj) {
      if (item == this.tamanhoTemp && this.tamanhoTemp) {
        obj.push(item);
        this.tamanhoTemp = "";
      }
      if (item == this.corTemp && this.corTemp) {
        obj.push(item);
        this.corTemp = "";
      }
    },
    inclurTamanho(item) {
      if (item) {
        this.tamanhoPost.push({ tamanho: item });
        this.tamanhoTemp = "";
      }
    },
    inclurCor(item) {
      if (item) {
        this.corPost.push({ cor: item });
        this.corTemp = "";
      }
    },

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
      if (!obj.tamanho) {
        formData.append("tamanho[]", "");
      } else {
        if (obj.tamanho.length) {
          for (let i = 0; i < obj.tamanho.length; i++) {
            formData.append("tamanho[]", obj.tamanho[i]);
          }
        }
      }
      if (!obj.cor) {
        formData.append("cor[]", "");
      } else {
        if (obj.cor.length) {
          for (let i = 0; i < obj.cor.length; i++) {
            formData.append("cor[]", obj.cor[i]);
          }
        }
      }
      if (!obj.descricao) {
      } else {
        if (obj.descricao.length) {
          for (let i = 0; i < obj.descricao.length; i++) {
            formData.append("descricao[]", obj.descricao[i]);
          }
        }
      }

      if (this.imagemPost[0]) {
        formData.append("thumb", this.imagemPost[0]);
      }
      if (this.imagemGaleriaPost) {
        console.log("Criando o objeto");
        let imagens = this.imagemGaleriaPost;
        for (let i = 0; i < imagens.length; i++) {
          formData.append("gallery[]", imagens[i]);
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
      this.descricaoTemp = "";
      descricaoProdu.value = "";
      formFileStoreEvent.value = "";
      formFileStoreThumb.value = "";
      atualizaformProductFile.value = "";
      formFileStoreProductEdit.value = "";
    },
    salvar() {
      let formData = new FormData();
      formData.append("title", this.tituloPost);
      formData.append("categoria_id", this.categoriaPost);
      formData.append("thumb", this.imagemPost[0]);
      for (let i = 0; i < this.tamanhoPost.length; i++) {
        formData.append("tamanho[]", this.tamanhoPost[i].tamanho);
      }
      for (let i = 0; i < this.corPost.length; i++) {
        formData.append("cor[]", this.corPost[i].cor);
      }
      for (let i = 0; i < this.descricaoPost.length; i++) {
        formData.append("descricao[]", this.descricaoPost[i]);
      }

      if (this.imagemGaleriaPost) {
        let imagens = this.imagemGaleriaPost;
        for (let i = 0; i < imagens.length; i++) {
          formData.append("gallery[]", imagens[i]);
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
  