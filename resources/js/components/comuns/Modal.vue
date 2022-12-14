<template>
  <div class="">
    <!-- Modal -->
    <div
      class="modal fade"
      :id="id"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div :class="tamanho">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">
              {{ titulo }}
            </h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <slot name="alertText"></slot>
            <slot name="conteudo"> </slot>
          </div>
          <slot name="footerModal"></slot>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["id", "titulo", "objInfo", "largura"],
  computed: {
    tamanho() {
      if (this.largura) {
        let text = "modal-dialog " + this.largura;
        return text;
      } else {
        let text = "modal-dialog ";
        return text;
      }
    },
  },
};
</script>