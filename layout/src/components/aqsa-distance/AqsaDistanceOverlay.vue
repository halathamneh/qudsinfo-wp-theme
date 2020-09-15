<template>
  <div class="overlay">
    <div class="overlay-content">
      <transition :appear="true" name="aqsa-distance-overlay" mode="out-in">
        <div
          key="success"
          class="aqsa-distance-result"
          v-if="status === 'success'"
        >
          <b>{{ result }}</b>
          <span class="text-muted">{{ $t("km") }}</span>
        </div>
        <div key="other" v-else>
          <b>{{ statusMessage }}</b>
          <dots-horizontal-loader v-show="status !== 'fail'" />
        </div>
      </transition>
      <b-button variant="light" class="cancel-btn" @click="cancel">
        {{ $t("back") }}</b-button
      >
    </div>
  </div>
</template>

<script>
import DotsHorizontalLoader from "../loaders/DotsHorizontalLoader.vue";

export default {
  name: "AqsaDistanceOverlay",
  components: { DotsHorizontalLoader },
  props: {
    cancel: {
      type: Function,
      default: () => {},
    },
    statusMessage: {
      type: String,
      default: "",
    },
    result: {
      type: Number,
      default: 0,
    },
    status: {
      type: String,
      default: "in-progress",
    },
  },
  mounted() {
    this.findDistance();
  },
  methods: {
    findDistance() {},
  },
};
</script>
