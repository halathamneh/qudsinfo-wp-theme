<template>
  <a :href="network.url" :title="network.name">
    <icon-svg />
  </a>
</template>

<script>
import { instagram } from "./social-networks";
import IconSvg from "../../images/social-networks/instagram.svg?inline";

export default {
  name: "InstagramBtn",
  components: {
    IconSvg,
  },
  data: () => ({ network: instagram }),
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
      fill: #e4405f;
    }
  }
}
</style>
