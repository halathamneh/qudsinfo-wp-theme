<template>
  <div class="point-details-wrapper">
    <div class="point-details">
      <button class="close-btn" @click="$emit('close')">
        &times;
      </button>
      <div v-if="imagesData.images.length" class="point-images">
        <PicsSlider :disabledAutoplay="true" :pic-data="imagesData" />
      </div>
      <h2 class="point-title">
        {{ point.popup_title }}
      </h2>
      <div class="point-content">
        <div v-html="point.popup_content" />
      </div>
    </div>
  </div>
</template>

<script>
import PicsSlider from "../photos/PicsSlider";

export default {
  name: "PointDetails",
  components: { PicsSlider },
  props: {
    point: {
      type: Object,
      default: () => {},
    },
  },
  computed: {
    imagesData() {
      let images = [];
      if (
        this.point.description_images &&
        this.point.description_images.length > 0
      ) {
        images = this.point.description_images.map((image) => ({
          large: image.url,
        }));
      }
      return {
        images,
        title: this.point.popup_title,
      };
    },
  },
};
</script>

<style lang="scss">
.point-details-wrapper {
  width: 100vw;
  height: 100vh;
  overflow-y: auto;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 30;
  padding: 64px 32px 100px;
  background-color: rgba(50, 50, 50, 0.5);
  @media screen and (max-width: 500px) {
    padding: 64px 16px 100px;
  }
}
.point-details {
  position: relative;
  max-width: 950px;
  width: 100%;
  margin: auto;
  background-color: rgba(255, 255, 255, 0.9);
  border-radius: 8px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2), 0 -1px 0px rgba(0, 0, 0, 0.02),
    0 -2px 6px rgba(80, 80, 80, 0.2);
}
.point-content {
  padding: 32px;
}
.point-title {
  padding: 32px 32px 0;
  font-size: 32px;
  font-weight: bold;
}
.point-images {
  height: 700px;
  padding: 10px 40px 40px;
  background-color: #222;
  border-radius: 8px 8px 0 0;
  overflow: hidden;
  @media screen and (max-width: 500px) {
    height: 300px;
  }
}
.close-btn {
  position: absolute;
  top: 0;
  left: -62px;
  padding: 0 16px;
  z-index: 99;
  color: #fff;
  background: rgba(0, 0, 0, 0.5);
  border-radius: 8px;
  outline: 0;
  border: none;
  font-size: 36px;
  @media screen and (max-width: 500px) {
    top: auto;
    bottom: calc(100% + 4px);
    left: 0;
  }
}
.point-details-wrapper .slick-slider {
  .slick-dots li {
    width: 10px;
    height: 10px;
    margin: 0 2px;
    button {
      width: 10px;
      height: 10px;
      padding: 0;
      &::before {
        width: 10px;
        height: 10px;
        color: #eee;
      }
    }
  }
  .slick-list {
    height: 100%;
  }
}
</style>
