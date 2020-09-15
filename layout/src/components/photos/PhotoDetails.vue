<template>
  <div class="photos-image-details">
    <div v-if="photo" class="image-details-container">
      <div class="details-head">
        <button @click="goBack">
          <ArrowIcon width="24" height="24" />
        </button>
        <h3>
          <router-link :to="getCategoryRoute()">{{ parentName() }}</router-link>
          <span class="separator">/</span>
          <span class="title">{{ photo.title }}</span>
        </h3>
        <share-buttons :title="photo.title" :label="$t('Share:')" />
      </div>
      <div class="details-images">
        <div class="images-sticky-wrapper">
          <pics-slider
            :pic-data="{
              title: photo.title,
              images: photo.gallery,
              fallbackImage: photo.image,
            }"
          />
        </div>
      </div>
      <div class="details-content container">
        <div class="details-groups">
          <div v-show="photo.location" class="details-group details-location">
            <b>{{ $t("Landmark Location") }}:</b>
            <div>{{ photo.location }}</div>
          </div>
          <div
            v-show="photo.location_to_dome"
            class="details-group details-location_to_dome"
          >
            <b>{{ $t("Landmark Location relative to Dome of the rock") }}:</b>
            <div>{{ photo.location_to_dome }}</div>
          </div>
          <div v-show="photo.history" class="details-group details-history">
            <b>{{ $t("Landmark History") }}:</b>
            <div>{{ photo.history }}</div>
          </div>
          <div
            v-show="photo.name_reason"
            class="details-group details-name_reason"
          >
            <b>{{ $t("Reason of the name") }}:</b>
            <div>{{ photo.name_reason }}</div>
          </div>
          <div v-show="photo.builtby" class="details-group details-builtby">
            <b>{{ $t("Builder Name") }}:</b>
            <div>{{ photo.builtby }}</div>
          </div>
        </div>
        <div class="more-details" v-html="photo.content"></div>
      </div>
    </div>
    <div v-else class="d-flex align-items-center justify-content-center">
      <dual-ring-loader />
    </div>
  </div>
</template>

<script>
import DualRingLoader from "../loaders/DualRingLoader";
import ArrowIcon from "../../images/next.svg?inline";
import PicsSlider from "./PicsSlider";
import ShareButtons from "../share/ShareButtons";

export default {
  name: "PhotoDetails",
  components: { ShareButtons, PicsSlider, DualRingLoader, ArrowIcon },
  props: {
    photo: {
      type: Object,
      default: () => null,
    },
    back: {
      type: String,
      default: () => "",
    },
  },
  computed: {
    mainCategory() {
      return this.photo.category.main;
    },
    childCategory() {
      return this.photo.category.child;
    },
  },
  methods: {
    parentName() {
      if (!this.childCategory) return this.mainCategory.name;
      return this.childCategory.name;
    },
    getCategoryRoute() {
      return {
        name: "list-photos",
        params: {
          cat: decodeURI(this.mainCategory.slug),
          child: this.childCategory ? decodeURI(this.childCategory.slug) : "",
        },
      };
    },
    goBack() {
      if (this.back) {
        this.$router.push(this.back);
      } else {
        this.$router.push(this.getCategoryRoute());
      }
    },
  },
};
</script>

<style></style>
