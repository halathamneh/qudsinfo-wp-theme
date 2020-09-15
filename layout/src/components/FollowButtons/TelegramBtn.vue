<template>
  <a :href="network.url" :title="network.name">
    <icon-svg />
  </a>
</template>

<script>
import { telegram } from "./social-networks";
import IconSvg from "../../images/social-networks/telegram.svg?inline";

export default {
  name: "TelegramBtn",
  components: {
    IconSvg,
  },
  data: () => ({ network: telegram }),
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
      fill: #2ca5e0;
    }
  }
}
</style>
