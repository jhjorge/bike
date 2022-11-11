<template>
  <div>
    <div class="row">
      <menu-component :items="menuNav" @emit-click="getLink"> </menu-component>
    </div>
    <div class="row">
      <div class="container">
        <component :is="conteudo" />
      </div>
    </div>
  </div>
</template>
<script>
import Home from "./layouts/Home.vue";
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
  },
  data: () => ({
    menuNav: [
      { label: "Home" },
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
</style>
  