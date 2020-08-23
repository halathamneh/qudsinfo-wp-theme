<template>
  <VueSlickCarousel v-bind="sliderSettings">
    <div class="image-slide" v-for="(image, i) in picData.images" :key="i">
      <img :src="image.large" :alt="picData.title" />
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
      autoplay: true,
      lazyLoad: "progressive",
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
