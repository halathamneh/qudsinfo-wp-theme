import Vue from "vue";
import VueRouter from "vue-router";
import i18n from "../../lang/i18n";
import store from "../../store";
import PhotosPage from "./photos";
import ListPhotos from "../../components/photos/ListPhotos";

Vue.use(VueRouter);

const router = new VueRouter({
  routes: [
    { path: "/", component: ListPhotos, name: "list-all-photos" },
    {
      path: "/image/:image_slug",
      component: ListPhotos,
      name: "view-photo",
    },
    {
      path: "/:cat/:child?",
      component: ListPhotos,
      name: "list-photos",
    },
  ],
});

const init = () => {
  new Vue({
    i18n,
    store,
    router,
    el: "#photos-page-wrapper",
    render: (h) => h(PhotosPage),
  });
};

export default init;
