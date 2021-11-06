<template>
  <div>

    <router-link
        :to="{name: 'products_index'}"
        class="btn btn-link m-4">
      Back
    </router-link>
    <div class="container p-2">
      <card style="white-space: pre-line;">
        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputPassword4">Name</label>
              <input type="text" class="form-control" id="inputPassword4" placeholder="Name">
            </div>
            <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">City</label>
              <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
              <label for="inputState">State</label>
              <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <label for="inputZip">Zip</label>
              <input type="text" class="form-control" id="inputZip">
            </div>
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Your Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </card>
    </div>
  </div>
</template>
