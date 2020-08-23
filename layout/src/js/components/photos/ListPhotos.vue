<template>
  <div class="photos-list">
    <photo-details
      v-if="imageDetailsVisible"
      :photo="image"
      :back="pathForBackHere"
    />
    <div v-if="photos.length > 0" class="row">
      <div
        v-for="photo in photos"
        :key="photo.id"
        class="col-xl-2 col-lg-3 col-md-4 col-6"
      >
        <div
          class="photo-list-item"
          :style="`background-image: url(${ImagePlaceholder})`"
        >
          <div role="button" tabindex="0" @click="showImageDetails(photo)">
            <img :src="photo.thumbnail" alt="" />
            <h3>{{ photo.title }}</h3>
          </div>
        </div>
      </div>
    </div>
    <div v-if="loading">
      <dots-loader />
    </div>
    <div v-else-if="photos.length > 0 && !noMore" class="text-center">
      <b-button variant="info" @click="loadMore"
        >{{ $t("Load more") }}
      </b-button>
    </div>
  </div>
</template>

<script>
import ImagePlaceholder from "@/images/image-placeholder.svg";
import { fetchPhoto, fetchPhotos } from "../../api/photosApi";
import DotsLoader from "../loaders/DotsLoader";
import PhotoDetails from "./PhotoDetails";

export default {
  name: "ListPhotos",
  components: { PhotoDetails, DotsLoader },
  props: ["cat", "subCat"],
  data: () => ({
    ImagePlaceholder,
    photos: [],
    loading: false,
    currentPage: 1,
    noMore: false,
    imageDetailsVisible: false,
    image: null,
    pathForBackHere: null,
  }),
  watch: {
    $route(to, from) {
      this.init(to, from);
    },
    cat(newCat, oldCat) {
      if (oldCat === null) this.init(this.$route);
    },
  },
  methods: {
    hideImageDetails() {
      this.imageDetailsVisible = false;
      this.image = null;
      this.pathForBackHere = null;
    },
    showImageDetails(image) {
      this.imageDetailsVisible = true;
      if (this.$route.name === "view-photo") {
        this.showPhoto(image);
      } else {
        this.pathForBackHere = this.$route.path;
        this.$router.push(this.imageUrl(image));
      }
    },
    reset() {
      this.noMore = false;
      this.photos = [];
      this.currentPage = 1;
      this.loading = true;
    },
    updatePhotos() {
      this.loading = true;
      fetchPhotos(
        this.cat ? this.cat.id : "all",
        this.subCat ? this.subCat.id : null,
        this.currentPage
      ).then((photos) => {
        this.photos.push(...photos);
        if (photos.length < 24) {
          this.noMore = true;
        }
        this.loading = false;
      });
    },
    loadMore() {
      this.currentPage += 1;
      this.updatePhotos();
    },
    imageUrl(image) {
      return {
        name: "view-photo",
        params: {
          cat: decodeURI(image.category.main.slug),
          child: image.category.child
            ? decodeURI(image.category.child.slug)
            : "",
          image_slug: decodeURI(image.slug),
        },
      };
    },
    showPhoto(imageSlug) {
      fetchPhoto(imageSlug).then((image) => {
        this.image = image;
        this.loading = false;
      });
    },
    init(route, prevRoute) {
      if (route.name === "view-photo")
        this.showImageDetails(route.params.image_slug);
      if (["list-all-photos", "list-photos"].indexOf(route.name) === -1) return;
      this.hideImageDetails();
      if (
        this.photos.length > 0 &&
        prevRoute &&
        prevRoute.params.cat === route.params.cat &&
        prevRoute.params.child === route.params.child
      )
        return;

      this.reset();
      this.updatePhotos();
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    },
  },
};
</script>

<style></style>
