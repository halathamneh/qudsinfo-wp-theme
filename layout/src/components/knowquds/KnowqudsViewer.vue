<template>
  <div class="knowquds-viewer-container">
    <BackToSite />
    <ViewerFloatingMenu
      :loading="loading"
      :posts="termData.posts || []"
      :term="termData"
      :post="currentPost"
    />

    <div v-if="loading" class="loading-wrapper">
      <FulfillingBouncingCircleSpinner
        :animation-duration="4000"
        :size="60"
        color="#eee"
      />
      <div class="msg">
        {{ $t("loading") }}
      </div>
    </div>
    <KnowqudsViewerBody
      v-if="showPost"
      :loading="loading"
      :current-post="currentPost || {}"
      @imageLoaded="loading = false"
      @select-point="selectPoint"
    />
    <div v-else-if="showTerm" class="knowquds-viewer">
      <div class="image-container">
        <img
          class="term-image"
          alt=""
          :src="termData.image"
          @load="onImageLoaded"
        />
      </div>
    </div>
    <PointDetails
      v-if="selectedPointDetails"
      :point="selectedPointDetails"
      @close="selectedPointDetails = null"
    />
    <div class="copyrights">
      {{ $t("copyrights") }}
    </div>
  </div>
</template>

<script>
import { getPostDetails, getTermDetails } from "../../api/knowquds";
import { FulfillingBouncingCircleSpinner } from "epic-spinners";
import ViewerFloatingMenu from "./ViewerFloatingMenu";
import KnowqudsViewerBody from "./KnowqudsViewerBody";
import PointDetails from "./PointDetails";
import BackToSite from "./BackToSite";

export default {
  name: "KnowqudsViewer",
  components: {
    KnowqudsViewerBody,
    ViewerFloatingMenu,
    FulfillingBouncingCircleSpinner,
    BackToSite,
    PointDetails,
  },
  data: () => ({
    loading: true,
    termData: {},
    currentPost: null,
    showTerm: false,
    showPost: false,
    selectedPointDetails: null,
  }),
  mounted() {
    document.body.style.overflow = "hidden";
    this.showPost = false;
    this.showTerm = false;
    this.getTerm(this.$route.params.cat).then(() => {
      if (this.$route.params.post) {
        const post = this.termData.posts.find(
          (p) => decodeURIComponent(p.slug) === this.$route.params.post
        );
        this.getPost(post);
        this.showPost = true;
      } else {
        this.showTerm = true;
      }
    });
  },
  beforeDestroy() {
    document.body.style.overflow = null;
  },
  beforeRouteUpdate(to, from, next) {
    console.log(to);
    this.loading = true;
    this.showPost = false;
    this.showTerm = false;
    if (to.params.cat !== from.params.cat) {
      this.termData = {};
      this.currentPost = {};
      this.getTerm(to.params.cat).then(() => {
        if (to.params.post && to.params.post !== from.params.post) {
          const post = this.termData.posts.find(
            (p) => decodeURIComponent(p.slug) === to.params.post
          );
          this.getPost(post).then(() => {
            this.showPost = true;
          });
        } else {
          this.showTerm = true;
        }
      });
    } else if (to.params.post && to.params.post !== from.params.post) {
      this.currentPost = {};
      const post = this.termData.posts.find(
        (p) => decodeURIComponent(p.slug) === to.params.post
      );
      this.getPost(post).then(() => {
        this.showPost = true;
      });
    } else {
      if (to.params.cat) {
        this.showTerm = true;
      } else {
        this.termData = {};
      }
      if (to.params.post) {
        this.showPost = true;
      } else {
        this.currentPost = {};
      }
    }
    next();
  },
  methods: {
    getTerm(term) {
      return getTermDetails(term).then((data) => {
        this.termData = data;
      });
    },
    getPost(post) {
      return getPostDetails(post.id).then((data) => {
        this.currentPost = data;
      });
    },
    onImageLoaded(e) {
      this.loading = false;
    },
    selectPoint(point) {
      this.selectedPointDetails = point;
    },
  },
};
</script>

<style lang="scss" scoped>
.knowquds-viewer-container {
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 9999;
  background: #2d2d42;
  display: flex;
  flex-direction: column;
}
.loading-wrapper {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  color: #ddd;
  z-index: 20;
  > .fulfilling-bouncing-circle-spinner {
    filter: drop-shadow(0 0 20px #2d2d42);
  }
  > .msg {
    margin-top: 36px;
    text-shadow: 0 0 20px 5px rgba(#2d2d42, 0.5);
  }
}
.term-image {
  object-fit: cover;
  min-height: 100vh;
  width: 100%;
}
.copyrights {
  color: #222;
  position: fixed;
  right: 16px;
  bottom: 16px;
  z-index: 20;
  font-size: 10px;
  padding: 4px 10px;
  background-color: rgba(255, 255, 255, 0.5);
  .rtl & {
    right: auto;
    left: 16px;
  }
}
</style>
