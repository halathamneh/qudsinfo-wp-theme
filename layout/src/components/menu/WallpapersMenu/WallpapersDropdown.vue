<template>
  <div class="menu-wrap-content">
    <ul>
      <li>
        <a :href="data.url">
          <i :class="data.icon"></i>
          {{ data.title }}
        </a>
        <small class="text-muted mt-2 d-block">{{
          $t("wallpapers description")
        }}</small>
      </li>
    </ul>
    <div>
      <img :src="wallpapersImage" alt="" />
    </div>
  </div>
</template>

<script>
import WallpapersImage from "../../../images/services/wallpapers.svg";

export default {
  name: "WallpapersDropdown",
  data: () => ({
    wallpapersImage: WallpapersImage,
  }),
  props: {
    data: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style scoped lang="scss">
.menu-wrap-content.content {
  width: 400px;
}
</style>
