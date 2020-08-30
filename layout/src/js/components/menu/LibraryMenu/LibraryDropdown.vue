<template>
  <div class="menu-wrap-content">
    <ul>
      <li>
        <a :href="data.url">
          <i :class="data.icon"></i>
          {{ data.title }}
        </a>
        <small class="text-muted mt-2 d-block">{{
          $t("library description")
        }}</small>
      </li>
    </ul>
    <div>
      <img :src="libraryImage" alt="" />
    </div>
  </div>
</template>

<script>
import LibraryImage from "../../../../images/services/library.svg";

export default {
  name: "LibraryDropdown",
  data: () => ({
    libraryImage: LibraryImage,
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
