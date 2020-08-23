<template>
  <a :href="network.url" :title="network.name">
    <icon-svg />
  </a>
</template>

<script>
import { snapchat } from "./social-networks";
import IconSvg from "../../../images/social-networks/snapchat.svg?inline";

export default {
  name: "SnapchatBtn",
  components: {
    IconSvg,
  },
  data: () => ({ network: snapchat }),
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
      fill: #fffc00;
    }
  }
}
</style>
