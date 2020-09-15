<template>
  <div class="menu-wrap-content divide">
    <div class="primary">
      <ul>
        <li v-for="item in data.subItems">
          <a :href="item.url">
            <i :class="item.icon"></i>
            {{ item.title }}
          </a>
        </li>
      </ul>
    </div>
    <div class="secondary">
      <ul>
        <li v-for="item in data.secondaryItems">
          <a :href="item.url">
            <i
              :class="`fa fa-angle-${currentLang === 'ar' ? 'left' : 'right'}`"
            ></i>
            {{ item.title }}
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import { currentLang } from "../../../lang/utils";

export default {
  name: "TeamsDropdown",
  data: () => ({
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
  padding: 0;
  width: auto;
  align-items: normal;
  justify-content: normal;
  .primary,
  .secondary {
    padding: 24px 16px;
  }
  .secondary {
    background-color: #f6f9fc;
  }
}
</style>
