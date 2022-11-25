<template>
  <nav aria-label="...">
    <ul class="pagination" style="cursor: pointer">
      <slot name="pagina"></slot>
    </ul>
  </nav>
</template>
<script>
export default {
  name: "Paginate",
};
</script>
