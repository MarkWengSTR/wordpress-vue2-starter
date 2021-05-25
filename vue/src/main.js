import Vue from "vue";
import App from "./App.vue";
import store from "./store";
import VueRouter from "vue-router";
import Page1 from "@/components/pages/page1.vue";
import Page2 from "@/components/pages/page2.vue";
import User from "@/components/pages/user.vue";
import ErrorPage from "@/components/pages/errorPage.vue";

Vue.config.productionTip = false;
Vue.use(VueRouter);

const router = new VueRouter({
  routes: [
    {
      path: "/page1",
      component: Page1
    },
    {
      path: "/page2",
      component: Page2
    },
    {
      path: "/user/:id(\\d+)",
      component: User
    },
    {
      path: "/404",
      component: ErrorPage
    },
    {
      path: "*",
      redirect: "/404"
    }
  ]
});

new Vue({
  store,
  router,
  render: h => h(App)
}).$mount("#app");
