<template>
  <div>
    <div class="container">
      <section v-if="errored">
        <p>
          Pedimos desculpas, não estamos conseguindo recuperar as informações no
          momento. Por favor, tente novamente mais tarde.
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
                <th scope="col">Data</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(conteudo, i) in conteudos" :key="i">
                <td v-on:value="formataData()">{{ post.created_at }}</td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </div>
</template>
<script>
export default {
  name: "Table",
  props: [titulo, conteudos],
};
</script>