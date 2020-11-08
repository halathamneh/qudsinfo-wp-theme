<template>
  <div class="h-100">
    <VueSlickCarousel v-if="picData.images.length > 1" v-bind="sliderSettings">
      <div class="image-slide" v-for="(image, i) in picData.images" :key="i">
        <img :src="image.large" :alt="picData.title" />
      </div>
    </VueSlickCarousel>
    <div v-else-if="picData.images.length === 1" class="image-slide">
      <img :src="picData.images[0].large" :alt="picData.title" />
    </div>
    <div v-else-if="picData.fallbackImage" class="image-slide">
      <img :src="picData.fallbackImage" :alt="picData.title" />
    </div>
    <div v-else class="d-flex align-items-center justify-content-center h-100">
      <span class="text-muted">{{ $t("No images uploaded.") }}</span>
    </div>
  </div>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";

export default {
  name: "PicsSlider",
  components: { VueSlickCarousel },
  data() {
    return {
      sliderSettings: {
        arrows: true,
        dots: true,
        infinite: true,
        slidesToScroll: 1,
        rtl: true,
        autoplay: !this.disabledAutoplay,
        lazyLoad: "progressive",
      },
    };
  },
  props: {
    picData: {
      type: Object,
      default: () => ({}),
    },
    disabledAutoplay: {
      type: Boolean,
      default: () => false,
    },
  },
  mounted() {
    import(/* webpackChunkName: "common-vendors" */ "@fancyapps/fancybox").then(
      () => {
        $("[data-fancybox]").fancybox({
          loop: true,
          thumbs: {
            autoStart: false, // Display thumbnails on opening
            hideOnClose: true, // Hide thumbnail grid when closing animation starts
          },
          buttons: ["share", "download", "thumbs", "close"],
        });
      }
    );
  },
};
</script>
