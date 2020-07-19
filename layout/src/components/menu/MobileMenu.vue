<template>
  <div class="mobile-menu">
    <mobile-search />
    <ul>
      <li v-for="menuItem in menuConfig">
        <template v-if="menuItem.dropdown === 'about'">
          <lang-switcher class="text-center" />
          <follow-buttons />
        </template>
        <template v-else>
          <a
            v-if="!menuItem.subItems || menuItem.subItems.length <= 1"
            :href="menuItem.url"
            >{{ menuItem.title }}</a
          >
          <template v-else>
            <small class="font-weight-bold text-muted mt-3 d-block">{{
              menuItem.title
            }}</small>
            <ul>
              <li v-for="item in menuItem.subItems">
                <a :href="item.url">
                  <i v-if="item.icon" :class="item.icon"></i>
                  {{ item.title }}
                </a>
              </li>
            </ul>
          </template>
        </template>
      </li>
    </ul>
  </div>
</template>

<script>
import FollowButtons from "../FollowButtons/FollowButtons";
import MobileSearch from "../Search/MobileSearch";
import LangSwitcher from "./LangSwitcher";

export default {
  name: "MobileMenu",
  components: { LangSwitcher, MobileSearch, FollowButtons },
  props: {
    menuConfig: {
      type: Object,
      default: {},
    },
  },
};
</script>

<style lang="scss" scoped>
.mobile-menu {
  margin-top: 32px;
  padding-bottom: 32px;
  max-height: 90vh;
  overflow-y: auto;
  > ul {
    padding: 0;
    list-style: none;
    font-size: 13px;
    line-height: 1.75;
    > li {
      padding: 0 32px;
      a {
        display: block;
        padding: 8px 4px;
      }
      + li {
        border-top: 1px solid #eee;
      }
    }
    ul {
      list-style: none;
      display: flex;
      flex-wrap: wrap;
      padding: 8px 32px;
      margin: 0 -32px;
      background-color: #f6f9fc;
      li {
        flex: 50%;
      }
    }
  }
}
</style>
