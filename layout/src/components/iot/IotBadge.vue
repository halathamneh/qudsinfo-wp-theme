<template>
  <b-badge :class="{ 'iot-badge': true, small }">{{
    $t("info of today")
  }}</b-badge>
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
