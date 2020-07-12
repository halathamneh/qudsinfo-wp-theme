<template>
  <div class="logo-image">
    <a href="/" :title="$t('qudsinfo')" class="header-logo"
      ><img
        class="lazy"
        data-src="https://cdn.qudsinfo.com/wp-content/uploads/2016/05/logo.png"
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
