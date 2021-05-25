import Vue from "vue";
import App from "./App.vue";
import store from "./store";
import VueRouter from "vue-router";

Vue.config.productionTip = false;
Vue.use(VueRouter);

const Page1 = {
  template: `<div>Page1</div>`
};
const Page2 = {
  template: `<div>Page2</div>`
};

const router = new VueRouter({
  routes: [
    {
      path: "/page1",
      component: Page1
    },
    {
      path: "/page2",
      component: Page2
    }
  ]
});

new Vue({
  store,
  router,
  render: h => h(App)
}).$mount("#app");
