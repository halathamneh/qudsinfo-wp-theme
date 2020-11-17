import Vue from "vue";
import i18n from "@/lang/i18n";
import WrittenInfo from "./written";
import InfosPage from "./infos-page";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const router = new VueRouter({
  routes: [
    { path: "/", component: WrittenInfo, name: "written-index" },
    {
      path: "/category/:cat?",
      component: WrittenInfo,
      name: "written-cat",
    },
  ],
});

const init = () => {
  new Vue({
    i18n,
    router,
    el: "#infos-list-page",
    render: (h) => h(InfosPage),
  });
};

export default init;
