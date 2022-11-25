<template>
  <div class="py-2" style="background-color: #b3b3b3">
    <nav class="container navbar text-end sticky-top">
      <div class="col-3"></div>
      <div class="col-md-5 col-sm">
        <a
          class="navbar-brand font-weight-bold text-capitalize"
          @click.stop.prevent="emitClick(0)"
          >Painel Administrativo</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="offcanvas offcanvas-end"
          tabindex="-1"
          id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel"
        >
          <div class="offcanvas-header">
            <h5
              class="offcanvas-title text-color-light font-weight-2"
              id="offcanvasNavbarLabel"
            >
              Painel Administrativo
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li v-for="(item, link) in items" :key="link" class="nav-item">
                <a
                  @click.stop.prevent="emitClick(link)"
                  class="nav-link"
                  aria-current="page"
                  href="#"
                  >{{ item.label }}</a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>
<script>
export default {
  name: "Menu",
  components: {},
  props: ["items", "titulo"],
  data: () => ({}),
  methods: {
    emitClick(link) {
      this.$emit("emit-click", link);
    },
  },
};
</script>
