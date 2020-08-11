<template>
  <parallax-container class="art-parallax-wrapper">
    <parallax-element
      :parallax-strength="10"
      :type="type"
      tag="div"
      class="globe-svg"
    >
      <globe-svg />
    </parallax-element>
    <parallax-element
      :parallax-strength="30"
      :type="type"
      tag="div"
      class="cloud-svg cloud-1"
    >
      <cloud-svg />
    </parallax-element>
    <parallax-element
      :parallax-strength="30"
      :type="type"
      tag="div"
      class="cloud-svg cloud-2"
    >
      <cloud-svg />
    </parallax-element>
    <parallax-element
      :parallax-strength="30"
      :type="type"
      tag="div"
      class="cloud-svg cloud-3"
    >
      <cloud-svg />
    </parallax-element>
  </parallax-container>
</template>

<script>
import {
  ParallaxContainer,
  ParallaxElement,
} from "vue-mouse-parallax/src/components";
import GlobeSvg from "@/images/aqsa-distance/globe.svg?inline";
import CloudSvg from "@/images/aqsa-distance/cloud.svg?inline";

export default {
  name: "AqsaDistanceArt",
  components: {
    GlobeSvg,
    CloudSvg,
    ParallaxContainer,
    ParallaxElement,
  },
  data: () => ({
    type: "translation",
  }),
};
</script>

<style lang="scss" scoped>
.art-parallax-wrapper {
  height: 100%;
}
.globe-svg {
  position: absolute;
  right: 0;
  bottom: -50px;
  .rtl & {
    left: 0;
    right: auto;
  }
}
.cloud-svg {
  position: absolute;
}
.cloud-1 {
  right: 316px;
  top: 45px;
  .rtl & {
    left: 316px;
    right: auto;
  }
}
.cloud-2 {
  left: 347px;
  top: 8px;
  .rtl & {
    left: auto;
    right: 347px;
  }
}
.cloud-3 {
  left: 693px;
  top: 94px;
  .rtl & {
    left: auto;
    right: 693px;
  }
}
</style>
