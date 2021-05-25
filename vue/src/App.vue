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
    <img alt="Vue logo" src="@/assets/logo.png" />
    <div>
      <b-button variant="outline-primary" to="/page1">Page1</b-button>
      <b-button variant="outline-primary" to="/page2">Page2</b-button>
    </div>
    <router-view></router-view>
    <HelloWorld msg="Welcome to Your  Vue.js App" />
  </div>
</template>

<script>
import HelloWorld from "./components/HelloWorld.vue";

export default {
  name: "app",
  data() {
    return {
      show: 2
    };
  },
  components: {
    HelloWorld
  }
};
</script>

<style lang="scss">
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
