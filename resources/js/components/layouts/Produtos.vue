<template>
  <div>
    <div class="container my-4">
      <h1 class="h1">Produtos</h1>
      <div class="container">
        <section v-if="errored">
          <p>
            Pedimos desculpas, não estamos conseguindo recuperar as informações
            no momento. Por favor, tente novamente mais tarde.
          </p>
        </section>
        <section v-else>
          <div v-if="loading">Carregando...</div>
          <div v-else class="row">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Titulo</th>
                  <th scope="col">Thumbnail</th>
                  <th scope="col">Slug</th>
                  <th scope="col">data</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Excluir</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="produto in produtos" :key="produto.id">
                  <th>{{ produto.id }}</th>
                  <td>{{ produto.title }}</td>
                  <td>{{ produto.thumb }}</td>
                  <td>{{ produto.slug }}</td>
                  <td>{{ produto.created_at }}</td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Produtos",
  data: () => ({
    urlProdutos: "http://localhost:8000/api/posts",
    produtos: [],
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
