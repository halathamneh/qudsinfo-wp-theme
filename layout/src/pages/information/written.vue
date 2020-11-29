<template>
  <div class="infos-page page-container container-fluid">
    <div class="row">
      <div class="col-12 col-md-2">
        <infos-tree />
      </div>
      <div class="col">
        <category-body v-if="slug" :slug="slug" />
        <span v-else>{{ $t("please select subject") }}</span>
      </div>
    </div>
  </div>
</template>

<script>
import InfosHeader from "@/components/information/InfosHeader";
import InfosTree from "@/components/information/InfosTree";
import CategoryBody from "@/components/information/CategoryBody";

export default {
  name: "WrittenInfo",
  components: {
    CategoryBody,
    InfosTree,
    InfosHeader,
  },
  data() {
    return {
      slug: decodeURIComponent(this.$route.params.cat),
    };
  },
};
</script>

<style scoped></style>
