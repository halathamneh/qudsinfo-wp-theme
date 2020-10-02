<template>
  <div class="photos-filters">
    <ul class="photos-categories">
      <li
        v-for="item in categories"
        :key="item.id"
        :ref="item.id"
        :class="{ active: selected && item.id === selected.id }"
      >
        <button @click="goToCategory(item)">
          {{ item.label }}
        </button>
      </li>
    </ul>
    <div
      v-if="selected && selected.children && selected.children.length"
      class="photos-categories-children"
    >
      <ul>
        <li
          v-for="item in selected.children"
          :key="item.name"
          :ref="item.id"
          :class="{
            active: selectedChild && item.id === selectedChild.id,
          }"
        >
          <button @click="goToSubCategory(item)">
            {{ item.label }}
          </button>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Filters',
  props: {
    categories: {
      type: Array,
      required: true,
    },
    onFilterChange: {
      type: Function,
      required: true,
    },
  },
  data: () => ({
    selected: undefined,
    selectedChild: undefined,
  }),
  watch: {
    $route (to) {
      if (to.name === 'list-all-photos') {
        this.setSelected('');
        this.setSelectedChild('');
      } else if (to.name === 'list-photos') {
        if (to.params.cat !== this.selected.slug) {
          this.setSelected(to.params.cat);
        }
        if (to.params.child) {
          this.setSelectedChild(to.params.child);
        }
      }
      this.apply();
    },
  },
  created () {
    if (this.selected) {return;}
    if (this.$route.params.cat) {
      const mainSlug = this.$route.params.cat;
      this.setSelected(mainSlug);
      if (this.$route.params.child) {
        const childSlug = this.$route.params.child;
        this.setSelectedChild(childSlug);
      }
    } else {
      this.setSelected('');
    }
    if (this.selected) {
      this.apply();
    }
  },
  updated () {
    if (this.selected) {
      this.scrollToItem(this.selected);
    }
    if (this.selectedChild) {
      this.scrollToItem(this.selectedChild);
    }
  },
  methods: {
    setSelectedChild (item) {
      if (item === '')
      {this.selectedChild = this.selected.children ? this.selected.children.find((c) => c.slug === '') : '';}
      else if (typeof item === 'string') {
        this.selectedChild = this.selected.children ? this.selected.children.find(
          (c) => decodeURI(c.slug) === item
        ) : '';
      } else {this.selectedChild = item;}
    },
    setSelected (item) {
      if (item === '')
      {this.selected = this.categories.find((c) => c.slug === '');}
      else if (typeof item === 'string') {
        this.selected = this.categories.find((c) => decodeURI(c.slug) === item);
      } else if (item !== this.selected) {
        this.selected = item;
      }
      this.setSelectedChild('');
    },
    goToCategory (item) {
      this.$router.push(`/${item.slug}`);
    },
    goToSubCategory (item) {
      this.$router.push(`/${this.selected.slug}/${item.slug}`);
    },
    apply () {
      this.onFilterChange(this.selected, this.selectedChild);
    },
    scrollToItem (item) {
      if (!this.$refs[item.id] || this.$refs[item.id].length === 0) {return;}
      const element = this.$refs[item.id][0];
      element.scrollIntoView({
        block: 'nearest',
        inline: 'center',
      });
    },
  },
};
</script>

<style></style>
