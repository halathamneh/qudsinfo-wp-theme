<template>
  <div class="infos-page page-container container-fluid">
    <b-row>
      <b-col cols="12" md="2">
        <infos-tree />
      </b-col>
      <b-col>
        <category-body v-if="slug" :slug="slug" />
        <span v-else>{{ $t("please select subject") }}</span>
      </b-col>
    </b-row>
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
