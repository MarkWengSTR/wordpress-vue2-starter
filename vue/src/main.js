import Vue from "vue";

import "@babel/polyfill";
import "mutationobserver-shim";
import "@/plugins/bootstrap-vue";

import "@/plugins/vue-fontawesome";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

import App from "./App.vue";
import store from "./store";
import VueRouter from "vue-router";

Vue.component("font-awesome-icon", FontAwesomeIcon);

Vue.config.productionTip = false;
Vue.use(VueRouter);

// const router = new VueRouter({
//   routes: [
//     {
//       path: "/page1",
//       component: Page1
//     },
//     {
//       path: "/page2",
//       component: Page2
//     }
//   ]
// });

new Vue({
  store,
  // router,
  render: h => h(App)
}).$mount("#app");
