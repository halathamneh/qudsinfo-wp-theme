<template>
  <div :class="{ 'badge badge-secondary': true, 'iot-badge': true, small }">
    {{ $t("info of today") }}
  </div>
</template>

<script>
export default {
  name: "IotBadge",
  props: {
    small: {
      type: Boolean,
      default: false,
    },
  },
};
</script>
