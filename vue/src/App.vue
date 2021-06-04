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
            Registered Customers
          </h3>
        </div>
        <div class="col-lg-6">
          <button class="btn btn-info float-right" @click="showAddModal = true">
            <font-awesome-icon icon="user" /> &nbsp;&nbsp;Add New Customer
          </button>
        </div>
      </div>
      <hr class="bg-info" />
      <div class="alert alert-danger" v-if="errorMsg">
        {{ errorMsg }}
      </div>
      <div class="alert alert-success" v-if="successMsg">
        {{ successMsg }}
      </div>

      <!-- Display Records -->
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-borderd table-striped">
            <thead>
              <tr class="text-center bg-info text-light">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <tr
                class="text-center"
                v-for="(user, index) in users"
                :key="user.id"
              >
                <td>{{ index + 1 }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.phone }}</td>
                <td>
                  <a
                    class="text-success"
                    href="#"
                    @click="
                      showEditModal = true;
                      selectUser(user);
                    "
                  >
                    <font-awesome-icon icon="edit" />
                  </a>
                </td>
                <td>
                  <a
                    class="text-danger"
                    href="#"
                    @click="
                      showDeleteModal = true;
                      selectUser(user);
                    "
                  >
                    <font-awesome-icon icon="trash-alt" />
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- add New Customer Model -->
      <div id="overlay" v-if="showAddModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add New Customer</h5>
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
                    v-model="newUser.name"
                  />
                </div>
                <div class="form-group">
                  <input
                    class="form-control form-control-lg"
                    type="email"
                    name="email"
                    placeholder="Email"
                    v-model="newUser.email"
                  />
                </div>
                <div class="form-group">
                  <input
                    class="form-control form-control-lg"
                    type="tel"
                    name="phone"
                    placeholder="Phone"
                    v-model="newUser.phone"
                  />
                </div>
                <div class="form-group">
                  <button
                    class="btn btn-info btn-block btn-lg"
                    @click="
                      addUser();
                      showAddModal = false;
                    "
                  >
                    Add Customer
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Edit Customer Model -->
      <div id="overlay" v-if="showEditModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Customer</h5>
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
                    v-model="selectedUser.name"
                  />
                </div>
                <div class="form-group">
                  <input
                    class="form-control form-control-lg"
                    type="email"
                    name="email"
                    v-model="selectedUser.email"
                  />
                </div>
                <div class="form-group">
                  <input
                    class="form-control form-control-lg"
                    type="tel"
                    name="phone"
                    v-model="selectedUser.phone"
                  />
                </div>
                <div class="form-group">
                  <button
                    class="btn btn-info btn-block btn-lg"
                    @click="
                      updateUser();
                      showEditModal = false;
                    "
                  >
                    Update Customer
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Delete Customer Model -->
      <div id="overlay" v-if="showDeleteModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Delete Customer</h5>
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
                Are you sure want to Delete this customer?
              </h4>
              <h5>You are deleting "{{ selectedUser.name }}"</h5>
              <hr />
              <button
                class="btn btn-danger btn-lg"
                @click="
                  deleteUser();
                  showDeleteModal = false;
                "
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
import axios from "axios";

export default {
  name: "app",
  data() {
    return {
      errorMsg: "",
      successMsg: "",
      showAddModal: false,
      showEditModal: false,
      showDeleteModal: false,
      users: [],
      newUser: { name: "", email: "", phone: "" },
      selectedUser: {},
      formConfig: {
        "Content-Type": "multipart/form-data",
        timeout: 10000
      }
    };
  },
  mounted() {
    this.getAllUsers();
  },
  methods: {
    getAllUsers() {
      axios.get(wpBackendUrls.customer.all) // eslint-disable-line
        .then(response => {
          this.users = response.data;
        })
        .catch(err => {
          this.errorMsg = "something Error";
          console.log(err);
        });
    },
    addUser() {
      var formData = this.toFormData(this.newUser);

      axios.post(wpBackendUrls.customer.create, formData, this.formConfig) // eslint-disable-line
        .then(() => {
          this.successMsg = `New User ${this.newUser.name} create success`;
          this.newUser = { name: "", email: "", phone: "" };
          this.getAllUsers();
        })
        .catch(err => {
          this.errorMsg = "something Error";
          console.log(err);
        });
    },
    updateUser() {
      axios.patch(wpBackendUrls.customer.rudBase + "/" + this.selectedUser.id, this.selectedUser) // eslint-disable-line
        .then(() => {
          this.selectedUser = {};
          this.successMsg = `User update success`;
          this.getAllUsers();
        })
        .catch(err => {
          this.errorMsg = "something Error";
          console.log(err);
        });
    },
    deleteUser() {
      axios.delete(wpBackendUrls.customer.rudBase + "/" + this.selectedUser.id) // eslint-disable-line
        .then(() => {
          this.successMsg = `User ${this.selectedUser.name} has Deleted`;
          this.selectedUser = {};
          this.getAllUsers();
        })
        .catch(err => {
          this.errorMsg = "something Error";
          console.log(err);
        });
    },
    toFormData(obj) {
      return Object.keys(obj).reduce((formData, key) => {
        formData.append(key, obj[key]);
        return formData;
      }, new FormData());
    },
    selectUser(user) {
      this.selectedUser = user;
    }
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
