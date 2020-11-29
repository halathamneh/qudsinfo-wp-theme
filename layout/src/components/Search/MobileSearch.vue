<template>
  <div class="search-box">
    <form action="/" method="get">
      <input
        class="form-control form-control-sm"
        type="text"
        name="s"
        :placeholder="$t('search placeholder')"
      />
      <button class="btn btn-outline-dark btn-sm" type="submit">
        <i class="fa fa-search"></i>
      </button>
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
