<template>
  <div :class="{ 'floating-menu-dropdown': true, open }">
    <div v-if="loading" class="loading-wrapper">
      <VclList :rtl="currentLang === 'ar'" />
    </div>
    <ul v-else>
      <li
        v-for="post in posts"
        :key="post.id"
        :class="{ 'list-item': true, active: selected.id === post.id }"
        @click="$emit('change')"
      >
        <router-link tag="button" :to="getItemUrl(post)">
          <i
            :class="[
              'fa',
              `fa-angle-${currentLang === 'ar' ? 'left' : 'right'}`,
            ]"
          />
          {{ post.title }}
          <span class="badge badge-info">
            {{ post.count }}
          </span>
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
import { VclList } from "vue-content-loading";
import { currentLang } from "../../lang/utils";

export default {
  name: "FloatingMenuDropdown",
  components: { VclList },
  props: {
    loading: { type: Boolean, default: () => true },
    posts: { type: Array, default: () => [] },
    selected: { type: Object, default: () => ({}) },
    open: { type: Boolean, default: () => false },
    onChange: { type: Function, default: () => () => {} },
  },
  data: () => ({
    filtered: [],
    currentLang,
  }),
  methods: {
    getItemUrl(post) {
      return {
        name: "knowquds-viewer",
        params: {
          cat: this.$route.params.cat,
          post: decodeURIComponent(post.slug),
        },
      };
    },
  },
};
</script>

<style lang="scss" scoped>
.floating-menu-dropdown {
  width: 100%;
  height: 100vh;
  max-height: calc(100vh - 104px);
  transform-origin: 50% 0;
  transform: scaleY(0.7);
  opacity: 0;
  visibility: hidden;
  transition: all 0.2s;
  &.open {
    transition-delay: 0.2s;
    transform: none;
    margin-right: 0;
    opacity: 1;
    visibility: visible;
  }
  ul {
    overflow: auto;
    max-height: 100%;
    padding: 16px;
    margin: 0;
    list-style: none;
  }
}
.list-item {
  & + & {
    border-top: 1px solid #eee;
  }
  &.active {
    color: #42287c;
    border: 1px solid #714091 !important;
    border-radius: 5px;
    overflow: hidden;
  }

  button {
    padding: 8px 16px;
    width: 100%;
    border: none;
    background: transparent;
    display: flex;
    align-items: center;

    i.fa {
      margin-right: 16px;
      color: #aaa;
    }

    &:hover {
      background-color: #eee;
    }
  }

  .badge {
    margin-left: auto;
  }

  .rtl & {
    i.fa {
      margin-right: 0;
      margin-left: 16px;
    }
    .badge {
      margin-right: auto;
      margin-left: 0;
    }
  }
}

.loading-wrapper {
  padding: 32px;
}
</style>
