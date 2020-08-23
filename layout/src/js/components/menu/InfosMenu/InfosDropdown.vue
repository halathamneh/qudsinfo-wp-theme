<template>
  <div class="menu-wrap-content">
    <ul>
      <li v-for="item in data.subItems">
        <a :href="item.url">
          <i :class="item.icon"></i>
          {{ item.title }}
        </a>
      </li>
    </ul>
    <div>
      <img :src="infoImage" alt="" />
    </div>
  </div>
</template>

<script>
import InfoImage from "../../../../images/services/our_info.svg";

export default {
  name: "InfosSecondaryDropdown",
  data: () => ({
    infoImage: InfoImage,
  }),
  props: {
    data: {
      type: Object,
      required: true,
    },
  },
};
</script>
