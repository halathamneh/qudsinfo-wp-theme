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
      />
      <ViewerPin
        v-if="!loading"
        v-for="point in currentPost.points"
        :key="point.id"
        :point="point"
        :active="activePoint.id && point.id === activePoint.id"
        :current-scale="currentScale"
        @hover="pointHover($event, point)"
        @click="pointHover($event, point)"
        :ref="`point-${point.id}`"
      />
    </div>
    <ViewerControls :panzoomInstance="panzoomInstance" />
    <div
      ref="infoPopupEl"
      :class="{
        'popup-wrapper': true,
        'popup-visible': popupVisible,
        bottom: popupAtBottom,
      }"
      :style="{
        left: popupPos[0] ? `${popupPos[0]}px` : null,
        top: popupPos[1] ? `${popupPos[1]}px` : null,
      }"
    >
      <PointPopup
        v-if="activePoint.id"
        :point="activePoint"
        @select-point="pointSelect"
        @inner-image-loaded="adjustPopupPosition"
      />
    </div>
  </div>
</template>

<script>
import Panzoom from "@panzoom/panzoom";
import PointPopup from "./PointPopup";
import ViewerPin from "./ViewerPin";
import ViewerControls from "./ViewerControls";

export default {
  name: "KnowqudsViewerBody",
  components: { ViewerControls, PointPopup, ViewerPin },
  props: {
    loading: { type: Boolean, default: () => true },
    currentPost: {
      type: Object,
      default: () => {},
    },
  },
  data: () => ({
    popupVisible: false,
    popupPos: [0, 0],
    activePoint: {},
    currentScale: 1,
    popupAtBottom: false,
    panzoomInstance: null,
  }),
  methods: {
    onViewerImageLoaded(e) {
      const panzoomTarget = e.target.parentElement;
      const imageEl = e.target;
      panzoomTarget.style.width = `${imageEl.scrollWidth}px`;
      panzoomTarget.style.height = `${imageEl.scrollHeight}px`;
      this.panzoomInstance = Panzoom(panzoomTarget, {
        maxScale: 2,
        minScale: 0.5,
        disableZoom: false,
        contain: "outside",
      });
      panzoomTarget.parentElement.addEventListener(
        "wheel",
        this.panzoomInstance.zoomWithWheel
      );
      panzoomTarget.addEventListener("panzoomchange", (e) => {
        this.activePoint = {};
        this.popupVisible = false;
        this.currentScale = e.detail.scale;
      });
      this.goToCenter(panzoomTarget);
      this.$emit("imageLoaded");
    },
    pointHover(e, point) {
      this.activePoint = point;
      setTimeout(() => {
        this.adjustPopupPosition();
      }, 1);
    },
    pointClickOutside() {
      this.popupVisible = false;
      this.activePoint = {};
    },
    pointSelect(point) {
      this.$emit("select-point", point);
    },
    goToCenter(targetEl) {
      if (!targetEl) return;
      setTimeout(() => {
        this.panzoomInstance.pan((-1 * targetEl.scrollWidth) / 2, -10);
      }, 10);
    },
    adjustPopupPosition() {
      if (!this.activePoint) return;
      const popupEl = this.$refs["infoPopupEl"];
      const pointEl = this.$refs[`point-${this.activePoint.id}`];
      const elRect = pointEl[0].$el.getBoundingClientRect();
      let yPos = elRect.y - popupEl.clientHeight;
      if (yPos < -8) {
        yPos += popupEl.clientHeight;
        this.popupAtBottom = true;
      } else {
        this.popupAtBottom = false;
      }
      this.popupPos = [
        elRect.x + elRect.width / 2 - popupEl.clientWidth / 2,
        yPos,
      ];
      this.popupVisible = true;
    },
  },
};
</script>

<style lang="scss" scoped>
.knowquds-viewer {
  height: 100%;
  direction: ltr;
  * {
    direction: ltr;
  }
  img {
    min-width: 100%;
    min-height: 100vh;
  }
  @media screen and (max-width: 500px) {
    margin-top: 90px;
  }
}
.image-container {
  position: relative;
  min-height: 100%;
  &.grapping {
    cursor: grabbing;
  }
}
.popup-wrapper {
  .rtl &,
  .rtl & * {
    direction: rtl;
  }
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 30;
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
