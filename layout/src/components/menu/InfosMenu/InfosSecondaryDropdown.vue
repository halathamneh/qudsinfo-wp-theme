<template>
  <div class="wrap-content">
    <div class="d-flex justify-content-between mb-3">
      <iot-badge small />
      <small v-if="infoOfToday" class="text-muted">
        <a :href="`/category/${infoOfToday.category.slug}`">
          {{ infoOfToday.category.label }}
        </a>
      </small>
    </div>
    <div v-if="!infoOfToday" class="loader">Loading</div>
    <template v-else>
      <h4>
        <a :href="infoOfToday.url">{{ infoOfToday.title }}</a>
      </h4>
      <div>
        <small v-html="infoOfToday.content" />
      </div>
    </template>
  </div>
</template>

<script>
import getInfoOfToday from "../../../api/fetchInfoOfToday";
import IotBadge from "../../iot/IotBadge";
import { mapActions, mapGetters } from "vuex";

export default {
  name: "InfosSecondaryDropdown",
  components: { IotBadge },
  computed: {
    ...mapGetters({ infoOfToday: "getTodayInfo" }),
  },
  mounted() {
    this.loadTodayInfo();
  },
  methods: {
    ...mapActions(["loadTodayInfo"]),
  },
};
</script>

<style scoped lang="scss">
.wrap-content {
  padding: 32px;
  width: 600px;
  min-height: 200px;
}
</style>
