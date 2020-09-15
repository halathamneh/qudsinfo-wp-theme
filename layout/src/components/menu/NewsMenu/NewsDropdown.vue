<template>
  <div class="menu-wrap-content">
    <div>
      <small class="text-muted mb-3 d-block">{{
        $t("news description")
      }}</small>
      <ul>
        <li v-for="item in data.subItems">
          <a :href="item.url">
            <i :class="item.icon"></i>
            {{ item.title }}
          </a>
        </li>
      </ul>
    </div>
    <div>
      <img :src="newsImage" alt="" />
    </div>
  </div>
</template>

<script>
import NewsImage from "../../../images/services/news.svg";

export default {
  name: "NewsDropdown",
  data: () => ({
    newsImage: NewsImage,
  }),
  props: {
    data: {
      type: Object,
      required: true,
    },
  },
};
</script>
