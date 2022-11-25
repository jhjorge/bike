<template>
  <div>
    <table class="table table-striped table-bordered table-responsive">
      <thead class="thead-dark">
        <tr>
          <slot name="topo"> </slot>
        </tr>
      </thead>
      <tbody>
        <slot name="conteudo"> </slot>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  name: "Table",
  props: [],
};
</script>