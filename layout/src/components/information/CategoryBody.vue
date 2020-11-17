<template>
  <div class="card category-body" v-show="category">
    <div :class="imageWrapperClass">
      <img :src="category.image" alt="" class="card-img" />
      <div class="card-head">
        <h2 class="card-title text-white font-weight-bold">
          {{ category.label }}
        </h2>
        <div v-if="hasDescription" class="mr-auto">
          <transition name="fade">
            <b-button
              v-if="!isInfosMode"
              @click="toggleInfos"
              variant="success"
              >{{ $t("show infos") }}</b-button
            >
            <b-button v-else @click="toggleInfos" variant="light">
              <fa :icon="['fas', 'arrow-right']" />
              <span class="mr-2">{{ $t("back") }}</span>
            </b-button>
          </transition>
        </div>
      </div>
    </div>
    <transition :name="isInfosMode ? 'slide-reverse' : 'slide'">
      <div key="details" v-if="!isInfosMode" class="card-body">
        <tree-loader v-if="loading" />
        <template v-else>
          <div class="card-text">
            <template v-for="paragraph in category.description">
              <h3>{{ paragraph.title }}</h3>
              <div v-html="paragraph.textHTML"></div>
            </template>
          </div>
        </template>
      </div>
      <div key="infos-list" v-else class="card-body">
        <category-infos :infos="infos" />
      </div>
    </transition>
  </div>
</template>

<script>
import placeholderImageWide from "@/images/placeholder-wide.svg";
import TreeLoader from "@/components/loaders/TreeLoader";
import CategoryInfos from "./CategoryInfos";
import { getCategoryDetails, getCategoryInfos } from "@/api/Infos";
import DotsLoader from "@/components/loaders/DotsLoader";

export default {
  name: "CategoryBody",
  components: { DotsLoader, CategoryInfos, TreeLoader },
  props: {
    slug: {
      type: String,
      default: () => "",
    },
  },
  data: () => ({
    category: {},
    infos: [],
    loading: true,
    imageWrapperClass: { "card-img-wrapper": true, small: false },
    isInfosMode: false,
  }),
  computed: {
    hasDescription() {
      return this.category.description && this.category.description.length;
    },
  },
  mounted() {
    getCategoryDetails(this.slug).then((cat) => {
      this.category = cat;
      if (!cat.image) this.category.image = placeholderImageWide;
      if (!this.hasDescription) {
        this.toggleInfos();
      } else {
        this.isInfosMode = false;
        this.loading = false;
      }
    });
  },
  methods: {
    toggleInfos() {
      this.isInfosMode = !this.isInfosMode;
      if (this.infos.length === 0) {
        getCategoryInfos(this.slug).then((infos) => {
          this.infos = infos;
          this.loading = false;
        });
      }
    },
  },
};
</script>

<style lang="scss"></style>
