<template>
  <div v-if="point" class="info-popup">
    <div
      v-if="point.description_images && point.description_images.length > 0"
      class="popup-image-wrapper"
    >
      <img
        :key="point.description_images[0].id"
        :src="point.description_images[0].thumb"
        alt=""
        @load="$emit('inner-image-loaded')"
      />
    </div>
    <div class="popup-content">
      {{ point.popup_title }}
      <br />
      <button
        class="btn btn-sm btn-link more-link"
        type="button"
        @click="$emit('select-point', point)"
      >
        {{ $t("know more") }}
        <i
          :class="[
            'fa',
            `fa-angle-double-${currentLang === 'ar' ? 'left' : 'right'}`,
          ]"
        />
      </button>
    </div>
  </div>
</template>

<script>
import { currentLang } from "../../lang/utils";

export default {
  name: "PointPopup",
  data() {
    return {
      currentLang,
    };
  },
  props: {
    point: {
      type: Object,
      default: () => {},
    },
  },
};
</script>

<style lang="scss" scoped>
.info-popup {
  background-color: rgba(255, 255, 255, 0.75);
  position: relative;
  border-radius: 8px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2), 0 -1px 0px rgba(0, 0, 0, 0.02),
    0 -2px 6px rgba(80, 80, 80, 0.2);
  display: flex;
  flex-direction: column;

  .popup-wrapper.bottom & {
    flex-direction: column-reverse;
    transform: translateY(15px);
  }

  .popup-image-wrapper {
    border-radius: 8px 8px 0 0;
    overflow: hidden;
    background-color: #eee;
    background-image: url("../../images/image-placeholder.svg");
    background-position: center center;
    background-repeat: no-repeat;
    background-size: 50px;
    height: 120px;
    width: 100%;
    min-width: 150px;
    img {
      width: 100%;
      object-fit: cover;
    }

    .popup-wrapper.bottom & {
      border-radius: 0 0 8px 8px;
    }
  }

  .popup-content {
    padding: 16px;
  }
  .more-link {
    font-size: 10px;
    font-weight: bold;
    padding: 0;
    i.fa {
      padding: 0 4px;
    }
  }

  &:after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translate(-50%, 0);
    width: 10px;
    height: 10px;
    border: 8px solid transparent;
    border-top: 10px solid rgba(255, 255, 255, 0.75);

    .popup-wrapper.bottom & {
      top: auto;
      bottom: 100%;
      border-top: 8px solid transparent;
      border-bottom: 10px solid rgba(255, 255, 255, 0.75);
    }
  }
}
</style>
