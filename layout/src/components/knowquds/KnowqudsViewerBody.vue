<template>
  <div class="knowquds-viewer">
    <div
      class="image-container"
      @mousedown="$event.currentTarget.classList.add('grapping')"
      @mouseup="$event.currentTarget.classList.remove('grapping')"
    >
      <img
        alt=""
        :src="currentPost.image"
        @load="onViewerImageLoaded"
        @click="pointClickOutside"
      >
      <ViewerPin
        v-for="point in currentPost.points"
        :key="point.id"
        :point="point"
        :active="point.id === activePoint.id"
        :current-scale="currentScale"
        @hover="pointHover($event, point)"
      />
    </div>
    <div
      ref="infoPopupEl"
      :class="{ 'popup-wrapper': true, 'popup-visible': popupVisible }"
      :style="{
        left: popupPos[0] ? `${popupPos[0]}px` : null,
        top: popupPos[1] ? `${popupPos[1]}px` : null,
      }"
    >
      <PointPopup
        v-if="activePoint.id"
        :point="activePoint"
        @select-point="pointSelect"
      />
    </div>
  </div>
</template>

<script>
import panzoom from 'panzoom';
import PointPopup from './PointPopup';
import ViewerPin from './ViewerPin';

export default {
  name: 'KnowqudsViewerBody',
  components: { PointPopup, ViewerPin },
  props: {
    currentPost: {
      type: Object,
      default: () => {},
    },
  },
  data: () => ({
    popupVisible: false,
    popupPos: [ 0, 0 ],
    activePoint: {},
    currentScale: 1,
  }),
  methods: {
    onViewerImageLoaded (e) {
      const x = e.target.offsetWidth / 2;
      const y = e.target.offsetHeight / 2;
      const instance = panzoom(e.target.parentElement, { minZoom: 0.5 });
      instance.on('zoom', (e) => {
        this.currentScale = e.getTransform().scale;
      });
      this.$emit('imageLoaded');
    },
    pointHover (e, point) {
      this.activePoint = point;
      setTimeout(() => {
        const elRect = e.target.getBoundingClientRect();
        const popupEl = this.$refs['infoPopupEl'];
        this.popupPos = [
          elRect.x + elRect.width / 2 - popupEl.clientWidth / 2,
          elRect.y - popupEl.clientHeight,
        ];
        this.popupVisible = true;
      }, 10);
    },
    pointClickOutside () {
      this.popupVisible = false;
      this.activePoint = {};
    },
    pointSelect (point) {
      this.$emit('select-point', point);
    }
  },
};
</script>

<style lang="scss" scoped>
.knowquds-viewer {
  img {
    width: 100%;
    min-height: 100%;
  }
}
.image-container {
  position: relative;
  cursor: grab;
  &.grapping {
    cursor: grabbing;
  }
}
.popup-wrapper {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 10;
  padding: 8px;
  visibility: hidden;
  opacity: 0;
  transition: all 0.2s;
  max-height: 100vh;
  &.popup-visible {
    visibility: visible;
    opacity: 1;
  }
}
</style>