<template>
  <div id="slider-image">
    <div class="slider-arrows">
      <div class="slider-arrow-right" @click="next()"></div>
      <div class="slider-arrow-left" @click="prev()"></div>
    </div>
    <div class="slider-slides">
      <div class="slider-image-item">
        <transition name="fade">
          <img :key="active" :src="images[active]" alt="" />
        </transition>
      </div>
    </div>
    <div class="slider-dots">
      <div
        v-for="(image, i) in images"
        :class="{ 'slider-dot': true, active: i === active }"
        @click="active = i"
      >
        *
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ImageSlider",
  props: {
    images: {
      type: Array,
      default: () => [],
    },
  },
  data() {
    return {
      active: 0,
    };
  },
  methods: {
    next() {
      this.active += 1;
      if (this.active === this.images.length) this.active = 0;
    },
    prev() {},
  },
};
</script>

<style lang="scss" scoped>
.slider-slides {
  display: flex;
}
</style>
