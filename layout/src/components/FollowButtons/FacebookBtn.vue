<template>
  <a :href="network.url" :title="network.name">
    <icon-svg />
  </a>
</template>

<script>
import { facebook } from "./social-networks";
import IconSvg from "../../images/social-networks/facebook.svg?inline";

export default {
  name: "FacebookBtn",
  components: {
    IconSvg,
  },
  data: () => ({ network: facebook }),
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
      fill: #1877f2;
    }
  }
}
</style>
