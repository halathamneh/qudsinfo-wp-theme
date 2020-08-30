<template>
  <div class="photos-page">
    <div class="photos-page-header">
      <h2><landmark-icon /> {{ $t("landmarks") }}</h2>
    </div>
    <div v-if="loadingCategories">
      <DotsLoader />
    </div>
    <template v-else>
      <filters :on-filter-change="update" :categories="categories" />
      <router-view :cat="cat" :subCat="subCat"></router-view>
    </template>
  </div>
</template>

<script>
import Filters from "../../components/photos/Filters";
import { getPhotosCategories } from "../../api/photosApi";
import DotsLoader from "../../components/loaders/DotsLoader";
import LandmarkIcon from "../../../images/landmark.svg?inline";

export default {
  name: "PhotosPage",
  components: { DotsLoader, Filters, LandmarkIcon },
  data: () => ({
    categories: [],
    loadingCategories: true,
    cat: null,
    subCat: null,
  }),
  methods: {
    update(cat, subCat) {
      this.cat = cat;
      this.subCat = subCat;
    },
  },
  mounted() {
    getPhotosCategories().then((data) => {
      this.categories = data;
      this.loadingCategories = false;
    });
  },
};
</script>
