<template>
  <div class="container mb-5">
    <products/>
  </div>
</template>

<script>
import products from "../components/products";

export default {
  name: "resource-index",
  components: {
    products
  }
}
</script>

<style lang="scss" scoped>
.card {
  margin: 5px;
}
</style>
