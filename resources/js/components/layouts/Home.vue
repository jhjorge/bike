<template>
  <div>
    <h1>Home</h1>
  </div>
</template>
<script>
export default {
  name: "Home",
  filters: {
    FormataData(value) {
      if (!value) return "";
      value = value.split("T");
      let date = value[0];
      let time = value[1];
      data = data.split("-");
      data = data[2] + "/" + data[1] + "/" + data[0];
      return data;
    },
  },
  data: () => ({
    urlProdutos: "http://localhost:8000/api/posts",
    produtos: [""],
    loading: true,
    errored: false,
  }),
  filters: {
    currencydecimal(value) {
      return value.toFixed(2);
    },
  },
  methods: {
    //
  },
  mounted() {
    axios
      .get(this.urlProdutos)
      .then((response) => {
        this.produtos = response.data;
      })
      .catch((error) => {
        console.log(error);
        this.errored = true;
      })
      .finally(() => (this.loading = false));
  },
};
</script>
