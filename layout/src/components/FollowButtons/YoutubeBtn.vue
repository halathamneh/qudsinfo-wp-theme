<template>
  <a :href="network.url" :title="network.name">
    <icon-svg />
  </a>
</template>

<script>
import { youtube } from "./social-networks";
import IconSvg from "../../images/social-networks/youtube.svg?inline";

export default {
  name: "YoutubeBtn",
  components: {
    IconSvg,
  },
  data: () => ({ network: youtube }),
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
      fill: #ff0000;
    }
  }
}
</style>
