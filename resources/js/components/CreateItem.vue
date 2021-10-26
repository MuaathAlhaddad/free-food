<template>
  <div :key="componentKey" class="card mt-4">
    <div class="card-body">
      <div
          v-if="status_msg"
          :class="{ 'alert-success': status, 'alert-danger': !status }"
          class="alert"
          role="alert"
      >
        {{ status_msg }}
      </div>
      <form>
        <div class="row">
          <div class="col-sm-4 text-center">
            <div class>
              <el-upload
                  :auto-upload="false"
                  :on-change="updateImageList"
                  :on-preview="handlePictureCardPreview"
                  action="https://jsonplaceholder.typicode.com/items/"
                  list-type="picture-card"
              >
                <i class="el-icon-plus"/>
              </el-upload>
              <el-dialog :visible.sync="dialogVisible">
                <img :src="dialogImageUrl" alt width="100%">
              </el-dialog>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <input
                      id="title"
                      v-model="product.title"
                      class="form-control"
                      placeholder="Item Title"
                      required
                      type="text"
                  >
                </div>
              </div>
              <div class="col">
                <div class="form-group row">
                  <div class="col-sm-2 text-right pr-0 mr-3">
                    <button class="btn btn-success" @click.prevent="product.quantity++">+</button>
                  </div>
                  <div class="col-sm-6  pr-0 pl-0">
                    <input
                        id="quantity"
                        v-model="product.quantity"
                        class="form-control text-center"
                        placeholder="Quantity"
                        required
                        type="text"
                    >
                  </div>
                  <div class="col-sm-2 text-left pl-1">
                    <button class="btn btn-danger" @click.prevent="product.quantity--">-</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group w-100">
                  <textarea id="item-content" v-model="product.description" class="form-control w-100"
                            placeholder="Item Description"
                            required rows="3"/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="card-footer text-right">
      <button
          class="btn btn-success "
          type="button"
          @click="createItem"
      >
        {{ isCreatingItem ? "Creating..." : "Create Item" }}
      </button>
    </div>
  </div>
</template>


<script>
import {mapActions} from 'vuex'

export default {
  name: 'CreateItem',
  data() {
    return {
      dialogImageUrl: '',
      dialogVisible: false,
      imageList: [],
      status_msg: '',
      status: '',
      isCreatingItem: false,
      title: '',
      body: '',
      quantity: 1,
      componentKey: 0,
      product: {
        id: 11,
        title: '',
        description: '',
        price: 50,
        status: 'available',
        ratings: 3,
        reviews: 5,
        isAddedToCart: false,
        isAddedBtn: false,
        isFavourite: false,
        quantity: 1,
        tags: ['raw', 'packaged', 'halal', 'hot']
      }
    }
  },
  methods: {
    ...mapActions(['getAllItems']),
    updateImageList(file) {
      this.imageList.push(file.raw)
    },
    handlePictureCardPreview(file) {
      this.dialogImageUrl = file.url
      this.imageList.push(file)
      this.dialogVisible = true
    },
    createItem(e) {
      e.preventDefault()
      this.$store.commit('pushProduct', this.product)

      this.product = {
        id: 12,
        title: '',
        description: '',
        price: 50,
        status: 'available',
        ratings: 3,
        reviews: 5,
        isAddedToCart: false,
        isAddedBtn: false,
        isFavourite: false,
        quantity: 1,
        tags: ['raw', 'packaged', 'halal', 'hot']
      }
    },
    validateForm() {
      // no vaildation for images - it is needed
      if (!this.title) {
        this.status = false
        this.showNotification('Item title cannot be empty')
        return false
      }
      if (!this.body) {
        this.status = false
        this.showNotification('Item body cannot be empty')
        return false
      }
      return true
    },
    showNotification(message) {
      this.status_msg = message
      setTimeout(() => {
        this.status_msg = ''
      }, 3000)
    }
  }
}
</script>
<style scoped>
.avatar-uploader .el-upload {
  border: 1px dashed #d9d9d9;
  border-radius: 6px;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}

.avatar-uploader .el-upload:hover {
  border-color: #409eff;
}

.avatar-uploader-icon {
  font-size: 28px;
  color: #8c939d;
  width: 178px;
  height: 178px;
  line-height: 178px;
  text-align: center;
}

.avatar {
  width: 178px;
  height: 178px;
  display: block;
}

#item-content {
  resize: none;
}

.card {
  border: none;
  transition: all 0.2s;
  /*box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);*/
}

.card:hover {
  margin-top: -.25rem;
  margin-bottom: .25rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
}
</style>
