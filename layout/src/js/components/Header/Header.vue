<template>
  <div class="d-flex">
    <div class="navigation-wrapper">
      <qudsinfo-menu />
    </div>
    <full-page-search />
  </div>
</template>

<script>
import Menu from "../menu/Menu";
import FullPageSearch from "../Search/FullPageSearch";

export default {
  name: "Header",
  components: { FullPageSearch, QudsinfoMenu: Menu },
};
</script>

<style scoped></style>
