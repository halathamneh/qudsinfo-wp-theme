<template>
  <div
    class="term-switcher-toggle"
    tabindex="0"
    role="button"
    @click="toggleTermSwitcher"
  >
    <ChevronDownIcon :class="{ flipped: !collapsed }" />
    <span v-if="collapsed">
      {{ selected ? selected.label : "" }}
    </span>
    <ul v-else-if="terms.length > 0">
      <li
        v-for="term in terms"
        :key="term.id"
        :class="{active: term.id === selected.id}"
      >
        <router-link
          :to="{ name: 'knowquds-viewer', params: { cat: term.slug } }"
        >
          {{ term.label }}
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
import { getTerms } from '../../api/knowquds';
import ChevronDownIcon from '../../images/chevron-down.svg?inline';

export default {
  name: 'TermSwitcher',
  components: { ChevronDownIcon },
  props: {
    selected: {
      type: Object,
      default: () => ({}),
    },
  },
  data: () => ({
    terms: [],
    collapsed: true,
  }),
  mounted () {
    getTerms().then((terms) => {
      this.terms = terms;
    });
  },
  methods: {
    toggleTermSwitcher () {
      this.collapsed = !this.collapsed;
    },
  },
};
</script>

<style lang="scss" scoped>
.term-switcher-toggle {
  background-color: #eee;
  padding: 8px 16px 16px;
  border-radius: 8px 8px 0 0;
  margin-bottom: -8px;
  font-size: 12px;
  color: #444;
  outline: none;
  border: 1px solid #d0d0d0;
  border-bottom: none;
  display: flex;
  align-items: flex-start;

  > span {
    align-self: center;
  }

  svg {
    width: 24px;
    height: 24px;
    margin-left: 4px;
    transition: all 0.2s;
    &.flipped {
      transform: rotate(180deg);
    }
  }
  &:hover {
    color: #111;
  }
}
ul {
  margin: 0;
  list-style: none;
  padding: 0 8px 0 0;
  li {
    margin: 4px 0;
    a {
      display: block;
      padding: 4px 0;
      color: #444;
      &:hover {
        color: #000;
      }
    }
    &.active {
      font-weight: bold;
    }
  }
}
</style>