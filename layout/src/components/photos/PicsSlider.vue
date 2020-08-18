<template>
  <VueSlickCarousel v-bind="sliderSettings">
    <div class="image-slide" v-for="(image, i) in picData.images" :key="i">
      <a :href="image.original" data-fancybox="images" :title="picData.title">
        <img :src="image.large" :alt="picData.title" />
      </a>
    </div>
  </VueSlickCarousel>
</template>

<script>
import VueSlickCarousel from "vue-slick-carousel";

export default {
  name: "PicsSlider",
  components: { VueSlickCarousel },
  data: () => ({
    sliderSettings: {
      arrows: true,
      dots: true,
      infinite: true,
      slidesToScroll: 1,
      rtl: true,
    },
  }),
  props: {
    picData: {
      type: Object,
      default: () => ({}),
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

<style lang="scss" scoped>
.slick-slider {
  margin: 0 32px;
}
.image-slide {
  text-align: center;
  img {
    margin: auto;
  }
}
</style>
