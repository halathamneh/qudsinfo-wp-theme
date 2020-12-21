<template>
  <div
    :class="{ point: true, active }"
    :style="{
      left: `calc(${point.left}% - 10px)`,
      top: `calc(${point.top}% - 10px)`,
      transform: `scale(${1 / currentScale})`,
    }"
    :title="point.name"
    @mouseenter="$emit('hover', $event)"
  >
    <MarkerIcon />
  </div>
</template>

<script>
import MarkerIcon from "../../images/location.svg?inline";

export default {
  name: "ViewerPin",
  components: { MarkerIcon },
  props: {
    point: {
      type: Object,
      default: () => {},
    },
    active: {
      type: Boolean,
      default: () => false,
    },
    currentScale: {
      type: Number,
      default: () => 1,
    },
  },
};
</script>

<style lang="scss" scoped>
.point {
  cursor: pointer;
  position: absolute;
  transition: all 0.25s 0.25s;
  touch-action: auto;

  svg {
    transition: all 0.15s;
    transform: translateY(-20px);
    width: 30px;
  }
  //&:hover,
  &.active {
    svg {
      opacity: 0;
      transform: translateY(-40px) scale(2);
    }
  }
}
</style>
