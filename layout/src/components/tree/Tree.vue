<template>
  <ul v-if="nodes.length > 0" :class="{ tree: true, 'sub-tree': subtree }">
    <tree-item
      v-for="(node, i) in nodes"
      :key="i"
      :node="node"
      :active="active"
    />
  </ul>
</template>

<script>
export default {
  name: 'Tree',
  components: {
    TreeItem: () => import('./TreeItem')
  },
  props: {
    nodes: { type: Array, default: () => [] },
    subtree: { type: Boolean, default: () => false },
    active: { type: String, default: () => '' }
  }
}
</script>

<style lang="scss">
.tree {
  list-style: none;
  padding-right: 18px;
  &.sub-tree {
    margin: 7px;
    padding-right: 22px;
  }
}
</style>
