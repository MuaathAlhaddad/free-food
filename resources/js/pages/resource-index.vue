<template>
 <div>
    <div class="container mb-5">
      <div v-if="role !== 'consumer'" class="container">
        <create-item/>
      </div>
      <products/>
    </div>
    <hr>
    <footer class="container bg-secondary" style="margin-top: 100px">
      <div class="d-flex justify-content-center ">
        <router-link
            class="btn btn-link "
            :to="{name: 'contact_us'}">
          Contact us
        </router-link>
      </div>
    </footer>
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
