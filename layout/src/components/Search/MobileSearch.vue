<template>
  <div class="search-box">
    <form action="/" method="get">
      <b-input
        size="sm"
        type="text"
        name="s"
        :placeholder="$t('search placeholder')"
      />
      <b-button size="sm" variant="outline-dark" type="submit">
        <i class="fa fa-search"></i>
      </b-button>
    </form>
  </div>
</template>

<script>
export default {
  name: "MobileSearch",
};
</script>

<style lang="scss" scoped>
.search-box {
  margin-top: 16px;
  padding: 0 16px;
  form {
    display: flex;
  }
  button {
    margin-left: 8px;
    .rtl & {
      margin-left: 0;
      margin-right: 8px;
    }
  }
}
</style>
