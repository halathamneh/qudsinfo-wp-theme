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

<style scoped>
.art-parallax-wrapper {
  height: 100%;
}
.globe-svg {
  position: absolute;
  left: 0;
  bottom: -50px;
}
.cloud-svg {
  position: absolute;
}
.cloud-1 {
  left: 16px;
  top: 185px;
}
.cloud-2 {
  left: 347px;
  top: 8px;
}
.cloud-3 {
  left: 693px;
  top: 94px;
}
</style>
