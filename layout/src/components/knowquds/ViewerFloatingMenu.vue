<template>
  <div :class="{ 'viewer-floating-menu': true, open: dropdownOpen }">
    <div class="floating-menu-header">
      <TermSwitcher :selected="term" />

      <div
        class="search-box"
        @click="isOpen = !dropdownOpen"
      >
        <div
          v-if="post && post.title"
          class="floating-menu-toggle"
        >
          <i class="fa fa-bars" />
        </div>
        <div class="content">
          <span v-if="post && post.title">
            {{ post.title }}
          </span>
          <span
            v-else
            class="text-muted"
          >
            {{ $t("please select") }}
          </span>
        </div>
      </div>
      <div
        v-if="!dropdownOpen && post && post.content"
        class="post-description"
        v-html="post.content"
      />
    </div>
    <FloatingMenuDropdown
      :posts="posts"
      :open="dropdownOpen"
      :selected="post || {}"
      @change="isOpen = !dropdownOpen"
    />
  </div>
</template>

<script>
import FloatingMenuDropdown from './FloatingMenuDropdown';
import TermSwitcher from './TermSwitcher';

export default {
  name: 'ViewerFloatingMenu',
  components: { FloatingMenuDropdown, TermSwitcher },
  props: {
    posts: { type: Array, default: () => [] },
    term: { type: Object, default: () => {} },
    post: { type: Object, default: () => {} },
  },
  data: () => ({
    isOpen: false,
  }),
  computed: {
    dropdownOpen () {
      if (!this.post || !this.post.id) {
        return true;
      }
      return this.isOpen;
    },
  },
};
</script>

<style lang="scss" scoped>
.viewer-floating-menu {
  position: absolute;
  top: 16px;
  right: 8px;
  z-index: 25;
  display: flex;
  flex-direction: column;
  width: 400px;
  height: 0;
  padding-top: 104px;
  background-color: transparent;
  transition: all 0.2s;
  &.open {
    background-color: #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    top: 0;
    right: 0;
    height: 100vh;
    width: 416px;
  }
}
.floating-menu-header {
  position: fixed;
  margin: 8px;
  top: 0;
  right: 0;
  width: 400px;
  color: #555;
  z-index: 30;
}
.search-box {
  align-items: center;
  display: flex;
  width: 100%;
  height: 50px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2), 0 -1px 0px rgba(0, 0, 0, 0.02),
    0 -2px 6px rgba(80, 80, 80, 0.2);
  cursor: pointer;
  position: relative;
  z-index: 1;
}
.floating-menu-toggle {
  color: #714091;
  font-size: 18px;
  background: none;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2px 8px;
  border: none;
  outline: 0;
  margin-right: 12px;
  transition: all 0.2s;
  &:hover,
  &:focus,
  &:active {
    color: #42287c;
  }
}
.content {
  padding: 4px 8px;
  flex: 1 1 100%;
  margin-right: 32px;
  .floating-menu-toggle + & {
    margin-right: 0;
  }
}
h3 {
  font-size: 18px;
  font-weight: 700;
  margin: 0;
}
.post-description {
  background-color: rgba(0, 0, 0, 0.5);
  color: #eee;
  padding: 32px 16px 16px;
  margin-top: -16px;
  border-radius: 0 0 8px 8px;
  position: relative;
  z-index: 0;
}
</style>
