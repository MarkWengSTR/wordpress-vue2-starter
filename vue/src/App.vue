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
          <h3 class="text-info">
            Registered Users
          </h3>
        </div>
        <div class="col-lg-6">
          <button class="btn btn-info float-right" @click="showAddModal = true">
            <font-awesome-icon icon="user" /> &nbsp;&nbsp;Add New User
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

      <!-- Display Records -->
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-borderd table-striped">
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
                <td>Mark</td>
                <td>123@gmail.com</td>
                <td>153252366</td>
                <td>
                  <a
                    class="text-success"
                    href="#"
                    @click="showEditModal = true"
                  >
                    <font-awesome-icon icon="edit" />
                  </a>
                </td>
                <td>
                  <a
                    class="text-danger"
                    href="#"
                    @click="showDeleteModal = true"
                  >
                    <font-awesome-icon icon="trash-alt" />
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- add New User Model -->
      <div id="overlay" v-if="showAddModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add New User</h5>
              <button type="button" class="close" @click="showAddModal = false">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-4">
              <form action="#" method="post">
                <div class="form-group">
                  <input
                    class="form-control form-control-lg"
                    type="text"
                    name="name"
                    placeholder="Name"
                  />
                </div>
                <div class="form-group">
                  <input
                    class="form-control form-control-lg"
                    type="email"
                    name="email"
                    placeholder="Email"
                  />
                </div>
                <div class="form-group">
                  <input
                    class="form-control form-control-lg"
                    type="tel"
                    name="phone"
                    placeholder="Phone"
                  />
                </div>
                <div class="form-group">
                  <button
                    class="btn btn-info btn-block btn-lg"
                    @click="showAddModal = false"
                  >
                    Add User
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit User Model -->
      <div id="overlay" v-if="showEditModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit User</h5>
              <button
                type="button"
                class="close"
                @click="showEditModal = false"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-4">
              <form action="#" method="post">
                <div class="form-group">
                  <input
                    class="form-control form-control-lg"
                    type="text"
                    name="name"
                    placeholder="Name"
                  />
                </div>
                <div class="form-group">
                  <input
                    class="form-control form-control-lg"
                    type="email"
                    name="email"
                    placeholder="Email"
                  />
                </div>
                <div class="form-group">
                  <input
                    class="form-control form-control-lg"
                    type="tel"
                    name="phone"
                    placeholder="Phone"
                  />
                </div>
                <div class="form-group">
                  <button
                    class="btn btn-info btn-block btn-lg"
                    @click="showEditModal = false"
                  >
                    Update User
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Delete User Model -->
      <div id="overlay" v-if="showDeleteModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Delete User</h5>
              <button
                type="button"
                class="close"
                @click="showDeleteModal = false"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body p-4">
              <h4 class="text-danger">
                Are you sure want to Delete this user?
              </h4>
              <h5>You are deleting 'Mark'</h5>
              <hr />
              <button
                class="btn btn-danger btn-lg"
                @click="showDeleteModal = false"
              >
                Yes
              </button>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <button
                class="btn btn-success btn-lg"
                @click="showDeleteModal = false"
              >
                No
              </button>
            </div>
          </div>
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
      successMsg: false,
      showAddModal: false,
      showEditModal: false,
      showDeleteModal: false
    };
  }
};
</script>
<style lang="scss">
#overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.6);
}
</style>
