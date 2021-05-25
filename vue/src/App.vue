<template>
  <div id="app">
    <img alt="Vue logo" src="@/assets/logo.png" />
    <div>
      <router-link to="/page1">Page1</router-link>
      <router-link to="/page2">Page2</router-link>
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
  margin-top: 60px;
}
</style>
