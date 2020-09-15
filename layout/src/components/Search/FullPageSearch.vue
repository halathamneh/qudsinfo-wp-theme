<template>
  <div :class="{ 'search-box': true, active }">
    <button class="search-close-button" @click="hideSearch">&times;</button>
    <form action="/" method="get">
      <input type="text" name="s" :placeholder="$t('search placeholder')" />
      <b-button size="lg" variant="outline-light" type="submit">
        <i class="fa fa-search"></i>
        {{ $t("search") }}
      </b-button>
    </form>
  </div>
</template>

<script>
export default {
  name: "FullPageSearch",
  computed: {
    active() {
      return this.$store.getters.isSearchActive;
    },
  },
  methods: {
    hideSearch() {
      this.$store.dispatch("toggleSearch", false);
    },
  },
};
</script>

<style lang="scss" scoped>
.search-box {
  visibility: hidden;
  opacity: 0;
  transition: all 0.25s;
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.85);
  display: flex;
  align-items: center;
  justify-content: center;
  &.active {
    visibility: visible;
    opacity: 1;
  }
  form {
    display: flex;
    transform: translateY(-100px);
    max-width: 800px;
  }
  input {
    font-size: 46px;
    background-color: transparent;
    border: none;
    border-bottom: 1px solid #999;
    transition: all 0.5s;
    color: #fff;
    padding-right: 0;
    padding-left: 40px;
    .rtl & {
      padding-left: 0;
      padding-right: 40px;
    }
    &:focus {
      border-bottom-color: #ddd;
      box-shadow: none;
      outline: none;
    }
  }
  button {
    border-radius: 18px;
    margin-left: 8px;
    i.fa {
      margin-right: 8px;
    }
    .rtl & {
      margin-left: 0;
      margin-right: 8px;
      i.fa {
        margin-right: 0;
        margin-left: 8px;
      }
    }
  }
  .search-close-button {
    border: none;
    background: none;
    color: #fff;
    font-size: 45px;
    position: absolute;
    top: 32px;
    right: 32px;
    left: auto;
    padding: 16px;
    .rtl & {
      right: auto;
      left: 32px;
    }
  }
}
</style>
