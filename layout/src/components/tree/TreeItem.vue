<template>
  <li
    :class="{
      'tree-item': true,
      expandable: isExpandable,
      active: isActive,
    }"
  >
    <router-link :to="node.to" :title="node.label" @click="update(node.slug)">{{
      node.label
    }}</router-link>
    <tree
      v-if="isExpandable"
      :subtree="true"
      :nodes="node.children"
      :active="active"
    />
  </li>
</template>

<script>
import Tree from "./Tree";
export default {
  name: "TreeItem",
  components: { Tree },
  props: {
    node: {
      type: Object,
      default: () => ({}),
    },
    active: {
      type: String,
      default: () => "",
    },
  },
  data: () => ({
    isExpandable: false,
    isActive: false,
  }),
  watch: {
    active(val) {
      this.isActive = this.node.to === val;
    },
  },
  mounted() {
    this.isExpandable = this.node.children && this.node.children.length > 0;
    this.isActive = this.node.to === this.active;
  },
  methods: {
    update(slug) {
      this.$store.dispatch("infos/setCurrentSubject", slug);
    },
  },
};
</script>

<style lang="scss">
.tree-item {
  margin-top: 4px;
  font-size: 13px;
  line-height: 1;
  position: relative;
  a {
    display: inline-block;
    padding: 4px 0;
    color: #000;
    white-space: nowrap;
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  &.active > a {
    font-weight: bold;
  }
  &.expandable {
  }
  .sub-tree &::before {
    content: "";
    height: 12px;
    width: 10px;
    position: absolute;
    top: 0;
    right: -17px;
    border-right: 1px solid #a0a0a0;
    border-bottom: 1px solid #a0a0a0;
  }
  .sub-tree &:not(:last-child)::after {
    content: "";
    height: 18px;
    position: absolute;
    top: 10px;
    right: -17px;
    border-right: 1px solid #a0a0a0;
  }
}
</style>
