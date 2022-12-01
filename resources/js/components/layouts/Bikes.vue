<template>
  <!--Modal de Criação -->

  <div>
    <modal-component id="modalEvento" titulo="Adicionar Bike">
      <template v-slot:alertText>
        <alert-component
          titleText="Erro ao tentar cadastrara Bike!"
          :msg="fetchDetails"
          tipo="danger"
          v-if="fetchStatus == 'erro'"
        ></alert-component>
        <alert-component
          titleText="Bike Criada!"
          :msg="fetchDetails"
          tipo="success"
          v-if="fetchStatus == 'criado'"
        ></alert-component>
      </template>
      <template v-slot:conteudo>
        <div class="mb-3">
          <label for="tituloEventoModal" class="form-label"
            >Titulo do Produto</label
          >
          <input
            v-model="tituloPost"
            type="text"
            class="form-control"
            id="tituloEventoModal"
          />
        </div>

        <div class="form-row row mb-3 px-5">
          <div class="btn-group">
            <button
              @click.prevent="visibleStatus()"
              class="mb-3 fs-6 fw-bolder btn btn-info"
            >
              <i :class="classIcon"></i>
              Ficha Técnica
            </button>
          </div>
          <div v-show="fichaVisible">
            <div class="row mb-3">
              <div class="col">
                <label class="form-label" for="quadroBike">Quadro</label>
                <input
                  type="text"
                  class="form-control"
                  id="quadroBike"
                  v-model="quadroBike"
                />
              </div>
              <div class="col">
                <label class="form-label" for="garfoBike">Garfo</label>
                <input
                  type="text"
                  class="form-control"
                  id="garfoBike"
                  v-model="garfoBike"
                />
              </div>
              <div class="col">
                <label class="form-label" for="movimentoDirecaoBike"
                  >Mov. direção</label
                >
                <input
                  v-model="movimentoDirecaoBike"
                  type="text"
                  class="form-control"
                  id="movimentoDirecaoBike"
                />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label class="form-label" for="guidaoBike">Guidão</label>
                <input
                  type="text"
                  class="form-control"
                  id="guidaoBike"
                  v-model="guidaoBike"
                />
              </div>
              <div class="col">
                <label class="form-label" for="manoplaBike">Manopla</label>
                <input
                  type="text"
                  class="form-control"
                  id="manoplaBike"
                  v-model="manoplaBike"
                />
              </div>
              <div class="col">
                <label class="form-label" for="freioBike">Freio</label>
                <input
                  type="text"
                  class="form-control"
                  id="freioBike"
                  v-model="freioBike"
                />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label class="form-label" for="aroBike">Aro</label>
                <input
                  type="text"
                  class="form-control"
                  id="aroBike"
                  v-model="aroBike"
                />
              </div>
              <div class="col">
                <label class="form-label" for="cuboBike">Cubo</label>
                <input
                  type="text"
                  class="form-control"
                  id="cuboBike"
                  v-model="cuboBike"
                />
              </div>
              <div class="col">
                <label class="form-label" for="pneuBike">Pneu</label>
                <input
                  type="text"
                  class="form-control"
                  id="pneuBike"
                  v-model="pneuBike"
                />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label class="form-label" for="pedivelaBike">Pedivela</label>
                <input
                  type="text"
                  class="form-control"
                  id="pedivelaBike"
                  v-model="pedivelaBike"
                />
              </div>
              <div class="col">
                <label class="form-label" for="correnteBike">Corrente</label>
                <input
                  type="text"
                  class="form-control"
                  id="correnteBike"
                  v-model="correnteBike"
                />
              </div>
              <div class="col">
                <label class="form-label" for="movimentoCentralBike"
                  >Mov. Central</label
                >
                <input
                  v-model="movimentoCentralBike"
                  type="text"
                  class="form-control"
                  id="movimentoCentralBike"
                />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label class="form-label" for="rodaLivreBike">Roda Livre</label>
                <input
                  type="text"
                  class="form-control"
                  id="rodaLivreBike"
                  v-model="rodaLivreBike"
                />
              </div>
              <div class="col">
                <label class="form-label" for="cambioDianteiroBike"
                  >Camb. Dianteiro</label
                >
                <input
                  v-model="cambioDianteiroBike"
                  type="text"
                  id="cambioDianteiroBike"
                  class="form-control"
                />
              </div>
              <div class="col">
                <label class="form-label" for="cambioTraseiroBike"
                  >Camb. Traseiro</label
                >
                <input
                  v-model="cambioTraseiroBike"
                  type="text"
                  class="form-control"
                  id="cambioTraseiroBike"
                />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label class="form-label" for="maneteBike">Manete</label>
                <input
                  type="text"
                  class="form-control"
                  id="maneteBike"
                  v-model="maneteBike"
                />
              </div>
              <div class="col">
                <label class="form-label" for="selimBike">Selim</label>
                <input
                  type="text"
                  class="form-control"
                  id="selimBike"
                  v-model="selimBike"
                />
              </div>
              <div class="col">
                <label class="form-label" for="canoteBike">Canote</label>
                <input
                  type="text"
                  class="form-control"
                  id="canoteBike"
                  v-model="canoteBike"
                />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label class="form-label" for="abracadeiraBike"
                  >Abraçadeira</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="abracadeiraBike"
                  v-model="abracadeiraBike"
                />
              </div>
              <div class="col">
                <label class="form-label" for="pedalBike">Pedal</label>
                <input
                  type="text"
                  class="form-control"
                  id="pedalBike"
                  v-model="pedalBike"
                />
              </div>
              <div class="col">
                <label class="form-label" for="pesoBike">Peso</label>
                <input
                  type="text"
                  class="form-control"
                  id="pesoBike"
                  v-model="pesoBike"
                />
              </div>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label" for="observacaoBike">Obeservação</label>

          <textarea
            v-model="observacaoBike"
            class="form-control"
            id="observacaoBike"
            rows="2"
          ></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label" for="apresentacaoModal">Conteudo</label>

          <textarea
            v-model="conteudoPost"
            class="form-control"
            id="apresentacaoModal"
            rows="4"
          ></textarea>
        </div>

        <div class="mb-3">
          <label for="conteudoPostModal" class="form-label">Descrição</label>
          <textarea
            v-model="descricaoBike"
            class="form-control"
            id="conteudoPostModalThumb"
            rows="4"
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
          <label for="formFileBanner" class="form-label">Banner</label>
          <input @change="carregarImgBanner($event)" class="form-control"
          accept=”image/*” type="file" id="formFileStoreBanner" />
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
            @click="salvar() & spinnerButton(), (fichaVisible = false)"
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
        <div class="row my-2">
          <h2 class="h4 my-2">Banner</h2>
          <img
            :src="'/storage/' + objInfo.banner"
            class="img-fluid"
            style="max-width: 50rem"
          />
        </div>
        <div class="mb-3 row">
          <h2 class="h4 my-2">Fotos</h2>

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
      titulo="Atualizar Bike"
    >
      <template v-slot:alertText>
        <alert-component
          titleText="Erro ao tentar atualizar a Bike!"
          :msg="fetchDetails"
          tipo="danger"
          v-if="fetchStatus == 'error'"
        ></alert-component>
        <alert-component
          titleText="Bike Atualizada!"
          :msg="fetchDetails"
          tipo="success"
          v-if="fetchStatus == 'atualizado'"
        ></alert-component>
      </template>

      <template v-slot:conteudo>
        <div class="mb-3">
          <label for="tituloEventoModal" class="form-label"
            >Titulo do Produto</label
          >
          <input
            v-model="objInfo.title"
            type="text"
            class="form-control"
            id="tituloEventoModal"
          />
        </div>

        <div class="form-row row mb-3 px-5">
          <button
            @click.prevent="visibleStatus()"
            class="mb-3 fs-6 fw-bolder btn btn-info"
          >
            Ficha Técnica <i :class="classIcon"></i>
          </button>
          <div v-show="fichaVisible">
            <div class="row mb-3">
              <div class="col">
                <label class="form-label" for="quadroBike">Quadro</label>
                <input
                  type="text"
                  class="form-control"
                  id="quadroBike"
                  v-model="objInfo.quadro"
                />
              </div>
              <div class="col">
                <label class="form-label" for="garfoBike">Garfo</label>
                <input
                  type="text"
                  class="form-control"
                  id="garfoBike"
                  v-model="objInfo.garfo"
                />
              </div>
              <div class="col">
                <label class="form-label" for="movimentoDirecaoBike"
                  >Mov. direção</label
                >
                <input
                  v-model="objInfo.movimentoDirecao"
                  type="text"
                  class="form-control"
                  id="movimentoDirecaoBike"
                />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label class="form-label" for="guidaoBike">Guidão</label>
                <input
                  type="text"
                  class="form-control"
                  id="guidaoBike"
                  v-model="objInfo.guidao"
                />
              </div>
              <div class="col">
                <label class="form-label" for="manoplaBike">Manopla</label>
                <input
                  type="text"
                  class="form-control"
                  id="manoplaBike"
                  v-model="objInfo.manopla"
                />
              </div>
              <div class="col">
                <label class="form-label" for="freioBike">Freio</label>
                <input
                  type="text"
                  class="form-control"
                  id="freioBike"
                  v-model="objInfo.freio"
                />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label class="form-label" for="aroBike">Aro</label>
                <input
                  type="text"
                  class="form-control"
                  id="aroBike"
                  v-model="objInfo.aro"
                />
              </div>
              <div class="col">
                <label class="form-label" for="cuboBike">Cubo</label>
                <input
                  type="text"
                  class="form-control"
                  id="cuboBike"
                  v-model="objInfo.cubo"
                />
              </div>
              <div class="col">
                <label class="form-label" for="pneuBike">Pneu</label>
                <input
                  type="text"
                  class="form-control"
                  id="pneuBike"
                  v-model="objInfo.pneu"
                />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label class="form-label" for="pedivelaBike">Pedivela</label>
                <input
                  type="text"
                  class="form-control"
                  id="pedivelaBike"
                  v-model="objInfo.pedivela"
                />
              </div>
              <div class="col">
                <label class="form-label" for="correnteBike">Corrente</label>
                <input
                  type="text"
                  class="form-control"
                  id="correnteBike"
                  v-model="objInfo.corrente"
                />
              </div>
              <div class="col">
                <label class="form-label" for="movimentoCentralBike"
                  >Mov. Central</label
                >
                <input
                  v-model="objInfo.movimentoCentral"
                  type="text"
                  class="form-control"
                  id="movimentoCentralBike"
                />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label class="form-label" for="rodaLivreBike">Roda Livre</label>
                <input
                  type="text"
                  class="form-control"
                  id="rodaLivreBike"
                  v-model="objInfo.rodaLivre"
                />
              </div>
              <div class="col">
                <label class="form-label" for="cambioDianteiroBike"
                  >Camb. Dianteiro</label
                >
                <input
                  v-model="objInfo.cambioDianteiro"
                  type="text"
                  id="cambioDianteiroBike"
                  class="form-control"
                />
              </div>
              <div class="col">
                <label class="form-label" for="cambioTraseiroBike"
                  >Camb. Traseiro</label
                >
                <input
                  v-model="objInfo.cambioTraseiro"
                  type="text"
                  class="form-control"
                  id="cambioTraseiroBike"
                />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label class="form-label" for="maneteBike">Manete</label>
                <input
                  type="text"
                  class="form-control"
                  id="maneteBike"
                  v-model="objInfo.manete"
                />
              </div>
              <div class="col">
                <label class="form-label" for="selimBike">Selim</label>
                <input
                  type="text"
                  class="form-control"
                  id="selimBike"
                  v-model="objInfo.selim"
                />
              </div>
              <div class="col">
                <label class="form-label" for="canoteBike">Canote</label>
                <input
                  type="text"
                  class="form-control"
                  id="canoteBike"
                  v-model="objInfo.canote"
                />
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <label class="form-label" for="abracadeiraBike"
                  >Abraçadeira</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="abracadeiraBike"
                  v-model="objInfo.abracadeira"
                />
              </div>
              <div class="col">
                <label class="form-label" for="pedalBike">Pedal</label>
                <input
                  type="text"
                  class="form-control"
                  id="pedalBike"
                  v-model="objInfo.pedal"
                />
              </div>
              <div class="col">
                <label class="form-label" for="pesoBike">Peso</label>
                <input
                  type="text"
                  class="form-control"
                  id="pesoBike"
                  v-model="objInfo.peso"
                />
              </div>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label" for="observacaoBike">Obeservação</label>

          <textarea
            v-model="objInfo.observacao"
            class="form-control"
            id="observacaoBike"
            rows="2"
          ></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label" for="apresentacaoModal">Conteudo</label>

          <textarea
            v-model="objInfo.content"
            class="form-control"
            id="apresentacaoModal"
            rows="4"
          ></textarea>
        </div>

        <div class="mb-3">
          <label for="conteudoPostModal" class="form-label">Descrição</label>
          <textarea
            v-model="objInfo.descricao"
            class="form-control"
            id="conteudoPostModalThumb"
            rows="4"
          ></textarea>
        </div>

        <div class="mb-3">
          <label for="formFileStoreEventEdit" class="form-label"
            >Alter Imagem de Destaque?</label
          >
          <input @change="carregarImg($event)" class="form-control"
          accept=”image/*” type="file" id="formFileStoreEventEdit" />
        </div>

        <div class="mb-3">
          <label for="formFileStoreBannerEdit" class="form-label"
            >Alter Banner?</label
          >
          <input @change="carregarImgBanner($event)" class="form-control"
          accept=”image/*” type="file" id="formFileStoreBannerEdit" />
        </div>

        <div class="mb-3">
          <label for="atualizaformFile" class="form-label"
            >Alter Galeria de fotos?</label
          >
          <input @change="carregarImgGaleria($event)" class="form-control"
          type="file" accept=”image/*” multiple id="atualizaformFile" />
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
            @click="
              atualizar(objInfo) & spinnerButton(), (fichaVisible = false)
            "
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
          titleText="Erro ao tentar remover a Bike"
          :msg="fetchDetails"
          tipo="danger"
          v-if="fetchStatus == 'deleteErro'"
        ></alert-component>
        <alert-component
          titleText="Bike Removida!"
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

          <div class="form-row row my-5 px-5">
            <button
              @click.prevent="visibleStatus()"
              class="mb-1 fs-6 fw-bolder btn btn-info"
            >
              Ficha Técnica <i :class="classIcon"></i>
            </button>
            <div v-show="fichaVisible">
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label" for="quadroBike">Quadro</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="quadroBike"
                    v-model="objInfo.quadro"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="garfoBike">Garfo</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="garfoBike"
                    v-model="objInfo.garfo"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="movimentoDirecaoBike"
                    >Mov. direção</label
                  >
                  <input
                    v-model="objInfo.movimentoDirecao"
                    type="text"
                    disabled
                    class="form-control"
                    id="movimentoDirecaoBike"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label" for="guidaoBike">Guidão</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="guidaoBike"
                    v-model="objInfo.guidao"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="manoplaBike">Manopla</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="manoplaBike"
                    v-model="objInfo.manopla"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="freioBike">Freio</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="freioBike"
                    v-model="objInfo.freio"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label" for="aroBike">Aro</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="aroBike"
                    v-model="objInfo.aro"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="cuboBike">Cubo</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="cuboBike"
                    v-model="objInfo.cubo"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="pneuBike">Pneu</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="pneuBike"
                    v-model="objInfo.pneu"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label" for="pedivelaBike">Pedivela</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="pedivelaBike"
                    v-model="objInfo.pedivela"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="correnteBike">Corrente</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="correnteBike"
                    v-model="objInfo.corrente"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="movimentoCentralBike"
                    >Mov. Central</label
                  >
                  <input
                    v-model="objInfo.movimentoCentral"
                    type="text"
                    disabled
                    class="form-control"
                    id="movimentoCentralBike"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label" for="rodaLivreBike"
                    >Roda Livre</label
                  >
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="rodaLivreBike"
                    v-model="objInfo.rodaLivre"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="cambioDianteiroBike"
                    >Camb. Dianteiro</label
                  >
                  <input
                    v-model="objInfo.cambioDianteiro"
                    type="text"
                    disabled
                    id="cambioDianteiroBike"
                    class="form-control"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="cambioTraseiroBike"
                    >Camb. Traseiro</label
                  >
                  <input
                    v-model="objInfo.cambioTraseiro"
                    type="text"
                    disabled
                    class="form-control"
                    id="cambioTraseiroBike"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label" for="maneteBike">Manete</label>
                  <input
                    disabled
                    type="text"
                    class="form-control"
                    id="maneteBike"
                    v-model="objInfo.manete"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="selimBike">Selim</label>
                  <input
                    disabled
                    type="text"
                    class="form-control"
                    id="selimBike"
                    v-model="objInfo.selim"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="canoteBike">Canote</label>
                  <input
                    disabled
                    type="text"
                    class="form-control"
                    id="canoteBike"
                    v-model="objInfo.canote"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label" for="abracadeiraBike"
                    >Abraçadeira</label
                  >
                  <input
                    disabled
                    type="text"
                    class="form-control"
                    id="abracadeiraBike"
                    v-model="objInfo.abracadeira"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="pedalBike">Pedal</label>
                  <input
                    disabled
                    type="text"
                    class="form-control"
                    id="pedalBike"
                    v-model="objInfo.pedal"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="pesoBike">Peso</label>
                  <input
                    disabled
                    type="text"
                    class="form-control"
                    id="pesoBike"
                    v-model="objInfo.peso"
                  />
                </div>
              </div>
            </div>
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
          <div class="row mb-3">
            <label for="ContentInfo" class="label form-label">Descrição</label>
            <textarea
              id="ContentInfo"
              disabled
              :value="objInfo.descricao"
              rows="2"
              v-if="objInfo.descricao"
            ></textarea>
          </div>
          <div class="row mb-3">
            <label for="ContentInfo" class="label form-label">Conteudo</label>
            <textarea
              id="ContentInfo"
              disabled
              :value="objInfo.content"
              rows="3"
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
      titulo="Visualizar Evento"
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

          <div class="form-row row mb-3 px-5">
            <button
              @click.prevent="visibleStatus()"
              class="mb-3 fs-6 fw-bolder btn btn-info"
            >
              Ficha Técnica <i :class="classIcon"></i>
            </button>
            <div v-show="fichaVisible">
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label" for="quadroBike">Quadro</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="quadroBike"
                    v-model="objInfo.quadro"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="garfoBike">Garfo</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="garfoBike"
                    v-model="objInfo.garfo"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="movimentoDirecaoBike"
                    >Mov. direção</label
                  >
                  <input
                    v-model="objInfo.movimentoDirecao"
                    type="text"
                    disabled
                    class="form-control"
                    id="movimentoDirecaoBike"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label" for="guidaoBike">Guidão</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="guidaoBike"
                    v-model="objInfo.guidao"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="manoplaBike">Manopla</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="manoplaBike"
                    v-model="objInfo.manopla"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="freioBike">Freio</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="freioBike"
                    v-model="objInfo.freio"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label" for="aroBike">Aro</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="aroBike"
                    v-model="objInfo.aro"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="cuboBike">Cubo</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="cuboBike"
                    v-model="objInfo.cubo"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="pneuBike">Pneu</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="pneuBike"
                    v-model="objInfo.pneu"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label" for="pedivelaBike">Pedivela</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="pedivelaBike"
                    v-model="objInfo.pedivela"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="correnteBike">Corrente</label>
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="correnteBike"
                    v-model="objInfo.corrente"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="movimentoCentralBike"
                    >Mov. Central</label
                  >
                  <input
                    v-model="objInfo.movimentoCentral"
                    type="text"
                    disabled
                    class="form-control"
                    id="movimentoCentralBike"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label" for="rodaLivreBike"
                    >Roda Livre</label
                  >
                  <input
                    type="text"
                    disabled
                    class="form-control"
                    id="rodaLivreBike"
                    v-model="objInfo.rodaLivre"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="cambioDianteiroBike"
                    >Camb. Dianteiro</label
                  >
                  <input
                    v-model="objInfo.cambioDianteiro"
                    type="text"
                    disabled
                    id="cambioDianteiroBike"
                    class="form-control"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="cambioTraseiroBike"
                    >Camb. Traseiro</label
                  >
                  <input
                    v-model="objInfo.cambioTraseiro"
                    type="text"
                    disabled
                    class="form-control"
                    id="cambioTraseiroBike"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label" for="maneteBike">Manete</label>
                  <input
                    disabled
                    type="text"
                    class="form-control"
                    id="maneteBike"
                    v-model="objInfo.manete"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="selimBike">Selim</label>
                  <input
                    disabled
                    type="text"
                    class="form-control"
                    id="selimBike"
                    v-model="objInfo.selim"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="canoteBike">Canote</label>
                  <input
                    disabled
                    type="text"
                    class="form-control"
                    id="canoteBike"
                    v-model="objInfo.canote"
                  />
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                  <label class="form-label" for="abracadeiraBike"
                    >Abraçadeira</label
                  >
                  <input
                    disabled
                    type="text"
                    class="form-control"
                    id="abracadeiraBike"
                    v-model="objInfo.abracadeira"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="pedalBike">Pedal</label>
                  <input
                    disabled
                    type="text"
                    class="form-control"
                    id="pedalBike"
                    v-model="objInfo.pedal"
                  />
                </div>
                <div class="col">
                  <label class="form-label" for="pesoBike">Peso</label>
                  <input
                    disabled
                    type="text"
                    class="form-control"
                    id="pesoBike"
                    v-model="objInfo.peso"
                  />
                </div>
              </div>
            </div>
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
          <div class="row mb-3">
            <label for="ContentInfo" class="label form-label">Descrição</label>
            <textarea
              id="ContentInfo"
              disabled
              :value="objInfo.descricao"
              rows="2"
              v-if="objInfo.descricao"
            ></textarea>
          </div>
          <div class="row mb-3">
            <label for="ContentInfo" class="label form-label">Conteudo</label>
            <textarea
              id="ContentInfo"
              disabled
              :value="objInfo.content"
              rows="3"
              v-if="objInfo.content"
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
            Bikes<button
              v-if="posts.total"
              data-toggle="tooltip"
              data-placement="top"
              title="Total de Bikes"
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
          <h2 class="h5">Lista de Bikes</h2>
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
              Nova Bike
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
  name: "Bikes",
  component: { Modal },
  computed: {
    classIcon() {
      if (this.fichaVisible) {
        let text = "bi bi-arrow-down-square";
        return text;
      } else {
        let text = "bi bi-arrow-right-square";
        return text;
      }
    },
  },

  data: () => ({
    urlPosts: "http://127.0.0.1:8000/api/bikes",
    posts: { data: [] },
    loading: true,
    loader: false,
    errored: false,
    fichaVisible: false,

    quadroBike: "",
    garfoBike: "",
    movimentoDirecaoBike: "",
    guidaoBike: "",
    manoplaBike: "",
    freioBike: "",
    aroBike: "",
    cuboBike: "",
    pneuBike: "",
    pedivelaBike: "",
    correnteBike: "",
    movimentoCentralBike: "",
    rodaLivreBike: "",
    cambioDianteiroBike: "",
    cambioTraseiroBike: "",
    maneteBike: "",
    selimBike: "",
    canoteBike: "",
    abracadeiraBike: "",
    pedalBike: "",
    pesoBike: "",
    observacaoBike: "",
    descricaoBike: "",
    bannerBike: "",

    tituloPost: "",
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
    visibleStatus() {
      this.fichaVisible = !this.fichaVisible;
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
      formData.append("descricao", obj.descricao);
      formData.append("quadro", obj.quadro);
      formData.append("garfo", obj.garfo);
      formData.append("movimentoDirecao", obj.movimentoDirecao);
      formData.append("guidao", obj.guidao);
      formData.append("manopla", obj.manopla);
      formData.append("freio", obj.freio);
      formData.append("aro", obj.aro);
      formData.append("cubo", obj.cubo);
      formData.append("pneu", obj.pneu);
      formData.append("pedivela", obj.pedivela);
      formData.append("corrente", obj.corrente);
      formData.append("movimentoCentral", obj.movimentoCentral);
      formData.append("rodaLivre", obj.rodaLivre);
      formData.append("cambioDianteiro", obj.cambioDianteiro);
      formData.append("cambioTraseiro", obj.cambioTraseiro);
      formData.append("manete", obj.manete);
      formData.append("selim", obj.selim);
      formData.append("canote", obj.canote);
      formData.append("abracadeira", obj.abracadeira);
      formData.append("pedal", obj.pedal);
      formData.append("peso", obj.peso);
      formData.append("observacao", obj.observacao);
      formData.append("content", obj.content);
      if (this.imagemPost[0]) {
        formData.append("thumb", this.imagemPost[0]);
      }
      if (this.bannerPost[0]) {
        formData.append("banner", this.bannerPost[0]);
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
            console.log(response);
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
      this.quadroBike = "";
      this.garfoBike = "";
      this.movimentoDirecaoBike = "";
      this.guidaoBike = "";
      this.manoplaBike = "";
      this.freioBike = "";
      this.aroBike = "";
      this.cuboBike = "";
      this.pneuBike = "";
      this.pedivelaBike = "";
      this.correnteBike = "";
      this.movimentoCentralBike = "";
      this.rodaLivreBike = "";
      this.cambioDianteiroBike = "";
      this.cambioTraseiroBike = "";
      this.maneteBike = "";
      this.selimBike = "";
      this.canoteBike = "";
      this.abracadeiraBike = "";
      this.pedalBike = "";
      this.pesoBike = "";
      this.observacaoBike = "";
      this.descricaoBike = "";
      this.conteudoPost = "";
      this.imagemPost = "";
      this.bannerPost = "";
      this.imagemGaleriaPost = [];
      formFileStoreBannerEdit.value = "";
      formFileStoreBanner.value = "";
      formFileStoreEvent.value = "";
      formFileStoreThumb.value = "";
      atualizaformFile.value = "";
      formFileStoreEventEdit.value = "";
    },
    salvar() {
      let formData = new FormData();
      formData.append("title", this.tituloPost);
      formData.append("descricao", this.descricaoBike);
      formData.append("quadro", this.quadroBike);
      formData.append("garfo", this.garfoBike);
      formData.append("movimentoDirecao", this.movimentoDirecaoBike);
      formData.append("guidao", this.guidaoBike);
      formData.append("manopla", this.manoplaBike);
      formData.append("freio", this.freioBike);
      formData.append("aro", this.aroBike);
      formData.append("cubo", this.cuboBike);
      formData.append("pneu", this.pneuBike);
      formData.append("pedivela", this.pedivelaBike);
      formData.append("corrente", this.correnteBike);
      formData.append("movimentoCentral", this.movimentoCentralBike);
      formData.append("rodaLivre", this.rodaLivreBike);
      formData.append("cambioDianteiro", this.cambioDianteiroBike);
      formData.append("cambioTraseiro", this.cambioTraseiroBike);
      formData.append("manete", this.maneteBike);
      formData.append("selim", this.selimBike);
      formData.append("canote", this.canoteBike);
      formData.append("abracadeira", this.abracadeiraBike);
      formData.append("pedal", this.pedalBike);
      formData.append("peso", this.pesoBike);
      formData.append("observacao", this.observacaoBike);
      formData.append("content", this.conteudoPost);
      formData.append("thumb", this.imagemPost[0]);
      formData.append("banner", this.bannerPost[0]);
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
            console.log(response);
          }, 2000);
          this.fetchStatus = !true;
          this.fetchDetails = !true;
        })
        .catch((erros) => {
          setTimeout(() => {
            this.fetchStatus = "erro";
            this.fetchDetails = erros.response;
            console.log(erros.response);
          }, 200);
          this.fetchStatus = null;
          this.fetchDetails = null;
        });
    },
    removePost(obj) {
      let confirma = confirm("Tem certeza que deseja remover esta Bike?");
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
    carregarImgBanner(e) {
      if (e.target.files) {
        this.bannerPost = e.target.files;
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
  