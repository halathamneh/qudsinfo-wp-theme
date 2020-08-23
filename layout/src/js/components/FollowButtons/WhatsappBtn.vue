<template>
  <a :href="network.url" :title="network.name">
    <icon-svg />
  </a>
</template>

<script>
import { whatsapp } from "./social-networks";
import IconSvg from "../../../images/social-networks/whatsapp.svg?inline";

export default {
  name: "WhatsappBtn",
  components: {
    IconSvg,
  },
  data: () => ({ network: whatsapp }),
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
      fill: #25d366;
    }
  }
}
</style>
