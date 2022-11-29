<template>
  <div>
    <div class="d-sm-none d-block">
      <menu-component :items="menuNav" :titulo="conteudo" @emit-click="getLink">
      </menu-component>
    </div>
    <div class="row m-0 p-0">
      <div class="col-md-2 d-sm-block d-none painel-nav">
        <div class="row text-center"><h2>Painel</h2></div>

        <div class="col">
          <ul class="nav nav-column">
            <li v-for="(item, i) in menuNav" :key="i" class="nav-item">
              <a
                @click.stop.prevent="conteudo = item.label"
                class="menu-item-nav"
                href=""
                >{{ item.label }}</a
              >
            </li>
          </ul>
        </div>
      </div>
      <div class="my-4 px-md-4 col container">
        <div class="">
          <component :is="conteudo" />
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Home from "./layouts/Home.vue";
import Bikes from "./layouts/Bikes.vue";
import Produtos from "./layouts/Produtos.vue";
import Blog from "./layouts/Blog.vue";
import Eventos from "./layouts/Eventos.vue";
import Menu from "./comuns/Menu.vue";

export default {
  name: "Painel",
  components: {
    Home,
    Produtos,
    Blog,
    Eventos,
    Menu,
    Bikes,
  },
  data: () => ({
    menuNav: [
      { label: "Home" },
      { label: "Bikes" },
      { label: "Produtos" },
      { label: "Blog" },
      { label: "Eventos" },
    ],
    conteudo: "Home",
  }),
  methods: {
    getLink(link) {
      this.conteudo = this.menuNav[link].label;
    },
  },
};
</script>
<style lang="sass" scoped>
.painel-nav
  display: inline-flex
  background-color: #B3B3B3
  padding: 2rem
  max-width: 100%
  box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.2)
  height: 100vh
  position: sticky
  top: 0
  ul
    display: block
    text-align: center
    li.nav-item

      padding-top: 2rem
      font-size: 1.1rem
      a.menu-item-nav
        color: #000
        text-transform: uppercase
</style>
  