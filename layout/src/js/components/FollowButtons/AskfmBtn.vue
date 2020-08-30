<template>
  <a :href="network.url" :title="network.name">
    <icon-svg />
  </a>
</template>

<script>
import { askfm } from "./social-networks";
import IconSvg from "../../../images/social-networks/askfm.svg?inline";

export default {
  name: "AskfmBtn",
  components: {
    IconSvg,
  },
  data: () => ({ network: askfm }),
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
      fill: #db3552;
    }
  }
}
</style>
