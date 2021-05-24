<template>
  <div id="app">
    <img alt="Vue logo" src="@/assets/logo.png" />
    <div v-if="show === 1">Page1</div>
    <div v-if="show === 2">Page2</div>
    <HelloWorld msg="Welcome to Your  Vue.js App" />
  </div>
</template>

<script>
import HelloWorld from "./components/HelloWorld.vue";

export default {
  name: "app",
  data() {
    return {
      show: 2,
      // eslint-disable-next-line
      logoUrl: vueTestLocalizer.vueUrl + "assets/logo.png"
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
