import Vue from "vue";
import i18n from "../../lang/i18n";
import KnowqudsPage from "./knowquds";
import VueRouter from "vue-router";
import KnowqudsViewer from "../../components/knowquds/KnowqudsViewer";
import KnowqudsTerms from "../../components/knowquds/KnowqudsTerms";

Vue.use(VueRouter);

const router = new VueRouter({
  routes: [
    { path: "/", component: KnowqudsTerms, name: "list-all-knowquds" },
    {
      path: "/:cat/:post?",
      component: KnowqudsViewer,
      name: "knowquds-viewer",
    },
  ],
});

const init = () => {
  const wpAdminBar = document.getElementById("wpadminbar");
  if (wpAdminBar) wpAdminBar.remove();

  new Vue({
    i18n,
    router,
    el: "#knowquds-page-wrapper",
    render: (h) => h(KnowqudsPage),
  });
};

export default init;
