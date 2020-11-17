<template>
  <perfect-scrollbar class="infos-subjects-tree">
    <h3>{{ $t("subjects") }}</h3>
    <tree-loader v-if="loading" />
    <tree :nodes="subjects" :active="$route.path" />
  </perfect-scrollbar>
</template>

<script>
import Tree from "../tree/Tree";
import TreeLoader from "@/components/loaders/TreeLoader";
import { getCategories } from "@/api/Infos";

export default {
  name: "InfosTree",
  components: { TreeLoader, Tree },
  data() {
    return {
      subjects: [],
      loading: true,
    };
  },
  mounted() {
    getCategories().then((subjects) => {
      this.subjects = subjects;
      this.loading = false;
    });
  },
  methods: {},
};
</script>

<style lang="scss"></style>
