<template>
  <div class="menu-wrap-content">
    <ul>
      <li v-for="item in data.subItems">
        <a :href="item.url">
          <i
            :class="`fa fa-angle-${currentLang === 'ar' ? 'left' : 'right'}`"
          ></i>
          {{ item.title }}
        </a>
      </li>
    </ul>
    <div>
      <img :src="picsImage" alt="" />
    </div>
  </div>
</template>

<script>
import PicsImage from "../../../images/services/milestones.svg";
import { currentLang } from "../../../lang/utils";

export default {
  name: "LandmarksDropdown",
  data: () => ({
    picsImage: PicsImage,
    currentLang,
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
  width: 500px;
}
</style>
