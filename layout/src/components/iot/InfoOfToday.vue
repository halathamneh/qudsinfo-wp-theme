<template>
  <div>
    <iot-badge />
    <div class="card rounded shadow mt-3 iot-card flex-row-reverse" no-body>
      <img
        :src="!info ? placeholder : info.image"
        alt=""
        class="card-img-right"
      />
      <div class="card-body">
        <div v-if="!info" class="loader">Loading</div>
        <template v-else>
          <h6 class="card-subtitle text-muted">
            <a :href="`/category/${info.category.slug}`">
              {{ info.category.label }}
            </a>
          </h6>
          <h4 class="card-title">
            <a :href="info.url">{{ info.title }}</a>
          </h4>
          <p class="card-text" v-html="info.content" />
        </template>
      </div>
    </div>
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
