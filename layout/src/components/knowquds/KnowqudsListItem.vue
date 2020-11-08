<template>
  <div class="knowquds-list-item">
    <router-link :to="{ name: 'knowquds-viewer', params: { cat: term.slug } }">
      <div class="img-wrapper">
        <img :src="image" alt="" />
      </div>
    </router-link>
    <h3>
      {{ title }}
    </h3>
    <div class="knowquds-item-content" v-html="description"></div>
    <router-link
      :to="{ name: 'knowquds-viewer', params: { cat: term.slug } }"
      class="btn btn-light"
      >{{ btnText }}</router-link
    >
  </div>
</template>

<script>
export default {
  name: "KnowqudsListItem",
  props: ["image", "title", "term", "btnText", "description"],
};
</script>

<style lang="scss" scoped>
.knowquds-list-item {
  overflow: hidden;
  padding: 16px 16px 32px;
  transition: all 0.25s;
  border-radius: 15px;
  background-color: rgba(0, 0, 0, 0.25);
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;

  h3 {
    font-weight: bold;
    margin: 32px 0;

    a {
      color: #fff;
    }
  }
  .img-wrapper {
    overflow: hidden;
    height: 350px;
    margin: -16px -16px 0;
    transition: all 0.8s;
  }
  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 15px 15px 0 0;
    transition: all 0.8s;
  }

  .knowquds-item-content {
    margin-bottom: auto;
  }

  .btn {
    margin-top: 24px;
  }

  &:hover img {
    transform: scale(1.25);
  }
}
</style>
