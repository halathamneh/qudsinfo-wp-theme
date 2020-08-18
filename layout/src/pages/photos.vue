<template>
  <div class="photos-page">
    <div class="container">
      <div class="photos-page-header">
        <h2>{{ $t("landmarks") }}</h2>
      </div>
      <div class="filters">
        <v-select v-model="selected" :options="options" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PhotosPage",
  data: () => ({
    selected: { label: "جميع الصور", value: "all" },
    options: [
      { label: "جميع الصور", value: "all" },
      { label: "المسجد الأقصى", value: "aqsa" },
      { label: "البلدة القديمة", value: "oldtown" },
    ],
  }),
};
</script>

<style lang="scss">
.photos-page {
  //background-color: #222;
  //color: #fff;
  padding: 32px 0;
  position: relative;
  .container {
    position: relative;
    z-index: 2;
  }
  .photos-page-header {
    padding: 32px 0;
  }
}
</style>
