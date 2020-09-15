<template>
  <div class="search-btn-wrapper">
    <button class="search-btn" @click="showSearch">
      <i class="fa fa-search"></i>
    </button>
  </div>
</template>

<script>
export default {
  name: "SearchBtn",
  methods: {
    showSearch() {
      this.$store.dispatch("toggleSearch", true);
    },
  },
};
</script>

<style lang="scss" scoped>
.search-btn-wrapper {
  margin: auto 16px;
}
.search-btn {
  font-size: 13px;
  border: 1px solid #ddd;
  background: none;
  width: 32px;
  height: 32px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  &:hover {
    background-color: #eee;
  }
  &:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(200, 200, 200, 0.5);
    border-color: #999;
  }
}
</style>
