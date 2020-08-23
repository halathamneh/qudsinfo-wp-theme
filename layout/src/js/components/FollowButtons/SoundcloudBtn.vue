<template>
  <a :href="network.url" :title="network.name">
    <icon-svg />
  </a>
</template>

<script>
import { soundcloud } from "./social-networks";
import IconSvg from "../../../images/social-networks/soundcloud.svg?inline";

export default {
  name: "SoundcloudBtn",
  components: {
    IconSvg,
  },
  data: () => ({ network: soundcloud }),
};
</script>

<style lang="scss" scoped>
svg {
  fill: #aaa;
}
a {
  display: block;
  width: 24px;
  height: 24px;
  &:hover {
    svg {
      fill: #ff3300;
    }
  }
}
</style>
