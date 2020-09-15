<template>
  <component
    :is="item.href ? 'a' : 'div'"
    :href="item.href"
    class="service-item"
  >
    <div class="item-text">
      <h3 class="title">{{ item.title }}</h3>
      <p class="description">{{ item.description }}</p>
    </div>
    <div class="item-image">
      <img :src="item.image" :alt="item.title" />
    </div>
  </component>
</template>

<script>
export default {
  name: "ServiceItem",
  props: {
    item: {
      type: Object,
      default: () => {},
    },
  },
};
</script>
