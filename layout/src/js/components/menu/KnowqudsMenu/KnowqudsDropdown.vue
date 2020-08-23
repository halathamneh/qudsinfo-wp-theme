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
      <img :src="knowqudsImage" alt="" />
    </div>
  </div>
</template>

<script>
import KnowqudsImage from "../../../../images/services/knowquds.svg";
import { currentLang } from "../../../lang/utils";

export default {
  name: "KnowqudsDropdown",
  data: () => ({
    knowqudsImage: KnowqudsImage,
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
