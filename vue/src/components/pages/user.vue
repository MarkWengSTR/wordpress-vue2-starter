<template>
  <div>
    <h2>User {{ $route.params.id }}</h2>
    {{ num }}
    <button @click="num++">+</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      num: 0
    };
  },
  mounted() {
    setTimeout(function() {
      window.alert("API!!!");
    }, 1000);
  }
};
</script>
