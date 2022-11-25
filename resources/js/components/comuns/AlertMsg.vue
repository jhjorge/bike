<template>
  <div>
    <div v-if="visible" :class="estilo" role="alert">
      <div class="text-center row">
        <h2 class="h6 text-uppercase">{{ titleText }}</h2>
      </div>
      <hr />
      <div class="row">
        <span v-if="msg.data.id"> {{ "ID do Post: " + msg.data.id }}</span>
        <span v-if="msg.data.msg"> {{ msg.data.msg }}</span>
        <span v-if="msg.data.erro"> {{ msg.data.erro }}</span>
        <ul v-if="msg.data.errors">
          <li v-for="(list, i) in msg.data.errors" :key="i">
            {{ list[0] }}
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["tipo", "msg", "titleText"],
  data: () => ({
    visible: true,
  }),
  computed: {
    estilo() {
      let text = "alert alert-" + this.tipo;
      return text;
    },
  },
  methods: {
    timeOut() {
      setTimeout(() => {
        this.visible = false;
      }, 10000);
    },
  },
  mounted() {
    this.timeOut();
  },
};
</script>