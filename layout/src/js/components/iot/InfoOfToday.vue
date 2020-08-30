<template>
  <div>
    <iot-badge />
    <b-card
      class="rounded shadow mt-3 iot-card"
      :img-src="!info ? placeholder : info.image"
      img-end
      no-body
    >
      <b-card-body>
        <div v-if="!info" class="loader">Loading</div>
        <template v-else>
          <b-card-sub-title>
            <a :href="`/category/${info.category.slug}`">
              {{ info.category.label }}
            </a>
          </b-card-sub-title>
          <b-card-title>
            <a :href="info.url">{{ info.title }}</a>
          </b-card-title>
          <b-card-text v-html="info.content" />
        </template>
      </b-card-body>
    </b-card>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
import IotBadge from "./IotBadge.vue";
import placeholder from "@/images/placeholder.svg";

export default {
  components: {
    IotBadge,
  },
  data: () => ({
    placeholder,
  }),
  computed: {
    ...mapGetters({ info: "getTodayInfo" }),
  },
  mounted() {
    this.loadTodayInfo();
  },
  methods: {
    ...mapActions(["loadTodayInfo"]),
  },
};
</script>
