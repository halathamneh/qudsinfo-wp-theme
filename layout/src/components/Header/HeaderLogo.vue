<template>
  <div class="logo-image">
    <a href="/" :title="$t('qudsinfo')" class="header-logo"
      ><img
        src="https://cdn.qudsinfo.com/wp-content/uploads/2016/05/logo.png"
        :alt="$t('qudsinfo')"
        :title="$t('qudsinfo')"
    /></a>
  </div>
</template>

<script>
export default {
  name: "HeaderLogo",
};
</script>

<style lang="scss">
.header-logo {
  //display: block;
  height: 100%;
}
.logo-image img {
  width: 113px;
}
</style>
