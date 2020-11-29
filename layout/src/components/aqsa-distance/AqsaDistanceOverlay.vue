<template>
  <div class="overlay">
    <div class="overlay-content">
      <transition :appear="true" name="aqsa-distance-overlay" mode="out-in">
        <div
          key="success"
          class="aqsa-distance-result"
          v-if="status === 'success'"
        >
          <span>{{ $t("your aqsa distance") }}</span>
          <div class="distance-number-result">
            <b>{{ result }}</b>
            <span class="text-muted">{{ $t("km") }}</span>
          </div>
          <div
            class="mt-4 d-flex flex-column justify-content-center align-items-center"
          >
            <div class="my-3">{{ $t("share") }}</div>
            <share-buttons
              :title="`${$t('my aqsa distance')} ${result} ${$t('km')}\n\n${$t(
                'find yours on'
              )} https://qudsinfo.com/\n#${$t('your_distance_from_aqsa')}`"
              :quote="`${$t('my aqsa distance')} ${result} ${$t('km')}\n\n${$t(
                'find yours on'
              )} https://qudsinfo.com/\n#${$t('your_distance_from_aqsa')} #${$t(
                'qudsinfo_tag'
              )}`"
              url="https://qudsinfo.com/"
              :hashtags="`${$t('your_distance_from_aqsa')},${$t(
                'qudsinfo_tag'
              )}`"
            />
          </div>
        </div>
        <div key="other" v-else>
          <b>{{ statusMessage }}</b>
          <dots-horizontal-loader v-show="status !== 'fail'" />
        </div>
      </transition>
      <button class="btn btn-light cancel-btn" @click="cancel">
        {{ $t("back") }}
      </button>
    </div>
  </div>
</template>

<script>
import DotsHorizontalLoader from "../loaders/DotsHorizontalLoader.vue";
import HeaderLogo from "../Header/HeaderLogo";
import ShareButtons from "../share/ShareButtons";

export default {
  name: "AqsaDistanceOverlay",
  components: { ShareButtons, HeaderLogo, DotsHorizontalLoader },
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
