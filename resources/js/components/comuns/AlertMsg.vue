<template>
  <div>
    <div :class="estilo" role="alert">
      <div class="text-center">
        <h3 class="h5">{{ titleText }}</h3>
      </div>
      <hr />
      <span v-if="msg.data.id"> {{ "ID do Post: " + msg.data.id }}</span>
      <ul v-if="msg.data.errors">
        <li v-for="(list, i) in msg.data.errors" :key="i">
          {{ list[0] }}
        </li>
      </ul>
    </div>
  </div>
</template>
<script>
export default {
  props: ["tipo", "msg", "titleText"],
  computed: {
    estilo() {
      let text = "alert alert-" + this.tipo;
      return text;
    },
  },
};
</script>