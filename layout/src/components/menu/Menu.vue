<template>
  <vsm-menu
    v-if="menu"
    :menu="menu"
    :base-width="380"
    :base-height="400"
    :screen-offset="10"
    element="div"
  >
    <template #before-nav>
      <li class="vsm-section">
        <HeaderLogo />
      </li>
    </template>

    <template #default="{ item }">
      <template v-if="!item.hide || !item.hide.includes(currentLang)">
        <div :is="item.content" :data="item" class="content" />
        <div :is="item.secondary" class="content--secondary" />
      </template>
    </template>

    <template #after-nav>
      <li class="vsm-section vsm-last-section">
        <lang-switcher class="vsm-mob-hide" />
        <search-btn class="vsm-mob-hide" />
        <vsm-mob>
          <mobile-menu :menu-config="menu" />
        </vsm-mob>
      </li>
    </template>
  </vsm-menu>
</template>

<script>
import Vue from "vue";
import VueStripeMenu from "vue-stripe-menu";
import SearchBtn from "../Search/SearchBtn";
import LangSwitcher from "./LangSwitcher";
import MobileMenu from "./MobileMenu";
import HeaderLogo from "../Header/HeaderLogo";
import { currentLang } from "../../lang/utils";

Vue.use(VueStripeMenu);

export default {
  components: { HeaderLogo, MobileMenu, LangSwitcher, SearchBtn },
  data() {
    return {
      menu: null,
      currentLang,
    };
  },
  mounted() {
    if (currentLang === "ar")
      import("./menu-config-ar.js").then(({ default: menuConfig }) => {
        this.menu = menuConfig;
      });
    else
      import("./menu-config-en.js").then(({ default: menuConfig }) => {
        this.menu = menuConfig;
      });
  },
};
</script>

<style lang="scss">
.vsm-menu {
  .vsm-last-section {
    margin-left: auto;

    .rtl & {
      margin-left: 0;
      margin-right: auto;

      .vsm-section_mob {
        margin-left: 0;
        margin-right: 10px;
      }
    }

    .vsm-mob-line {
      background-color: #666;
    }
  }

  .vsm-root {
    display: flex;
  }

  .vsm-link {
    font-size: 14px;
    font-weight: bold;
    color: #333;
  }
}

.menu-wrap-content {
  padding: 32px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 600px;
  min-height: 181px;
}

.menu-wrap-content,
.secondary-wrap-content {
  ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  li {
    font-size: 16px;
    margin-bottom: 6px;

    i.fa {
      margin: 0 8px 0 0;

      .rtl & {
        margin: 0 0 0 8px;
      }
    }

    a {
      white-space: nowrap;
      padding: 4px 18px 4px 8px;
      display: inline-block;
      transition: background-color 0.25s;

      &:hover {
        border-radius: 5px;
        background-color: #f6f9fc;
        text-decoration: none;
      }

      .rtl & {
        padding: 4px 8px 4px 18px;
      }
    }
  }
}

.rtl {
  .vsm-mob-close {
    right: auto;
    left: 0;
  }

  .vsm-mob-content__wrap {
    transform-origin: 0 0;
  }
}
</style>
