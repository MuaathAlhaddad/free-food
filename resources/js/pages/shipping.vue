<template>
  <div class="shipping-container">
    <div class="card">
      <div class="d-flex flex-row">
        <router-link
            :to="{name: 'products_index'}"
            class="btn btn-primary mt-4">
          Back to Items
        </router-link>
      </div>
      <div class="checkmark-container">
        <i class="checkmark">✓</i>
      </div>
      <h1>Success</h1>
      <p>Your item is on the way to you;<br/> please update the status if your receive the item!</p>
      <select v-model="status" class="form-control" data-minimum-results-for-search="Infinity"
              data-toggle="select"
              @change="removeProductsFromList">
        <option>In Progress</option>
        <option>Delivered</option>
      </select>
    </div>
  </div>
</template>
<script>
export default {
  name: 'shipping',
  data() {
    return {
      status: 'In Progress'
    }
  },
  methods: {
    removeProductsFromList() {
      if (this.status === 'Delivered') {
        this.$store.commit('removeDeliveredProductsFromList')
      }
    }
  }

}
</script>
<style scoped>
.shipping-container {
  text-align: center;
  padding: 40px 0;
  background: #EBF0F5;
}

.checkmark-container {
  border-radius: 200px;
  height: 200px;
  width: 200px;
  background: #F8FAF5;
  margin: 0 auto;
}

h1 {
  color: #88B04B;
  font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
  font-weight: 900;
  font-size: 40px;
  margin-bottom: 10px;
}

p {
  color: #404F5E;
  font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
  font-size: 20px;
  margin: 0;
}

i {
  color: #9ABC66;
  font-size: 100px;
  line-height: 200px;
  margin-left: -15px;
}

.card {
  background: white;
  padding: 60px;
  border-radius: 4px;
  box-shadow: 0 2px 3px #C8D0D8;
  display: inline-block;
  margin: 0 auto;
}
</style>
