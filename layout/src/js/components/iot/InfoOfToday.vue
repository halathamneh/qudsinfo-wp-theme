<template>
  <div>
    <iot-badge />
    <b-card
      class="rounded shadow mt-3 iot-card"
      :img-src="loading ? placeholder : info.image"
      img-end
      no-body
    >
      <b-card-body>
        <div v-if="loading" class="loader">Loading</div>
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
    <!--      <div class="d-flex justify-content-end">-->
    <!--        <img src="/images/placeholder.svg" alt="" />-->
    <!--      </div>-->
  </div>
</template>

<script>
import IotBadge from "./IotBadge.vue";
import placeholder from "@/images/placeholder.svg";
import getInfoOfToday from "../../api/getInfoOfToday";

export default {
  components: {
    IotBadge,
  },
  data: () => ({
    placeholder,
    info: {},
    loading: true,
  }),
  mounted() {
    getInfoOfToday().then((info) => {
      this.info = info;
      this.loading = false;
    });
  },
};
</script>
