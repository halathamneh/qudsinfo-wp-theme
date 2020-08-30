<template>
  <div class="menu-wrap-content">
    <small class="ml-3">{{ $t("about description") }}</small>
    <img :src="logoImage" alt="" />
  </div>
</template>

<script>
import LogoImage from "../../../../images/sLogo.png";

export default {
  name: "AboutDropdown",
  data: () => ({
    logoImage: LogoImage,
  }),
};
</script>

<style scoped lang="scss">
.menu-wrap-content.content {
  padding: 24px 16px;
  width: 500px;
}
</style>
