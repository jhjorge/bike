<template>
  <div>
    <div class="container my-4">
      <h1>Eventos</h1>
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
                  <th scope="col">Local</th>
                  <th scope="col">Thumbnail</th>
                  <th scope="col">Slug</th>
                  <th scope="col">Data</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Excluir</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="evento in eventos" :key="evento.id">
                  <th>{{ evento.id }}</th>
                  <td>{{ evento.title }}</td>
                  <td>{{ evento.locale }}</td>
                  <td>{{ evento.thumb }}</td>
                  <td>{{ evento.slug }}</td>
                  <td>{{ formatDate(evento.date) }}</td>
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
  name: "eventos",
  data: () => ({
    urlEventos: "http://localhost:8000/api/eventos",
    evento: [],
    loading: true,
    errored: false,
  }),

  methods: {
    formatDate(dateString) {
      const date = new Date(dateString);
      // Then specify how you want your dates to be formatted
      return new Intl.DateTimeFormat("default", { dateStyle: "short" }).format(
        date
      );
    },
  },
  mounted() {
    axios
      .get(this.urlEventos)
      .then((response) => {
        this.eventos = response.data;
      })
      .catch((error) => {
        console.log(error);
        this.errored = true;
      })
      .finally(() => (this.loading = false));
  },
};
</script>
  