<template>
  <div class="team-slideshow-item">
    <div class="item-content">
      <div class="item-text">
        <h3>{{ item.title }}</h3>
        <p>{{ item.description }}</p>
      </div>
    </div>
    <div class="item-image">
      <img :src="item.image" alt="" />
    </div>
    <div class="item-text-bottom">
      <div v-for="(statItem, i) in item.stats" :key="i" class="stats-item">
        <div class="stats-item-circle" v-html="statItem.number" />
        <span class="stats-item-label">{{ statItem.label }}</span>
      </div>
      <a :href="item.pageLink" class="stats-item stats-read-more">
        <div class="stats-item-circle">
          <i class="fa fa-arrow-left fa-2x" />
        </div>
        <span class="stats-item-label">{{ $t("know more") }}</span>
      </a>
    </div>
  </div>
</template>

<script>
export default {
  name: "TeamSlideshowItem",
  props: {
    item: {
      type: Object,
      default: () => ({}),
    },
  },
};
</script>

<style lang="scss" scoped></style>
