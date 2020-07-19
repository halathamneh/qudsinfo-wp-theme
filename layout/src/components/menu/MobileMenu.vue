<template>
  <div class="mobile-menu">
    <mobile-search />
    <ul>
      <li v-for="menuItem in menuConfig">
        <follow-buttons v-if="menuItem.dropdown === 'about'" />
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
import menuConfig from "./menu-config-ar";
import FollowButtons from "../FollowButtons/FollowButtons";
import MobileSearch from "../Search/MobileSearch";

export default {
  name: "MobileMenu",
  components: { MobileSearch, FollowButtons },
  data: () => ({
    menuConfig,
  }),
};
</script>

<style lang="scss" scoped>
.mobile-menu {
  padding: 32px 0;
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
