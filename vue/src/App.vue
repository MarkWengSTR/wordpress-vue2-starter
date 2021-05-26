<template>
  <div id="app">
    <div class="container-fluid">
      <div class="row bg-dark">
        <div class="col-lg-12">
          <div class="text-center text-light display-4">
            CRUD Vue
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-3">
        <div class="col-lg-6">
          <h3 class="text-info">Registered Users</h3>
        </div>
        <div class="col-lg-6">
          <button class="btn btn-info float-right">
            <i class="fas fa-user" />
            &nbsp;&nbsp;Add New User
          </button>
        </div>
      </div>
      <hr class="bg-info" />
      <div class="alert alert-danger" v-if="errorMsg">
        Error Message
      </div>
      <div class="alert alert-success" v-if="successMsg">
        Success Message
      </div>

      <!-- Displaying Records -->
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-bordered table-striped">
            <thead>
              <tr class="text-center bg-info text-light">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-center">
                <td>1</td>
                <td>wolfmania</td>
                <td>wolfmania@gmail.com</td>
                <td>4452366464</td>
                <td>
                  <a href="#" class="text-success">
                    <i class="fas fa-edit"></i>
                  </a>
                </td>
                <td>
                  <a href="#" class="text-danger">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "app",
  data() {
    return {
      errorMsg: false,
      successMsg: false
    };
  }
};
</script>

<style>
.fa {
  fone-family: FontAwsome;
}
</style>
