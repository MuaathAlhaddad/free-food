<template>
  <div class="container mb-5">
    <div v-if="role !== 'consumer'" class="container">
      <create-item/>
    </div>
    <products/>
  </div>
</template>

<script>
import products from "../components/products";
import CreateItem from "../components/CreateItem.vue";

export default {
  name: "resource-index",
  components: {
    products,
    CreateItem
  },
  data() {
    return {
      role: ''
    }
  },
  created() {
    fetch("http://127.0.0.1:8000/getRole")
        .then(response => response.json())
        .then(data => (this.role = data.role));
  }
}
</script>

<style lang="scss" scoped>
.card {
  margin: 5px;
}
</style>
