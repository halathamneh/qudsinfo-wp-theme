<template>
  <div class="on-this-day-banner">
    <div class="otd-title">{{ $t("otd-title") }}</div>
    <b-card no-body class="rounded no-shadow">
      <template v-slot:header>
        <b>05 حزيران</b>
        <br />
        <span>الموافق 12 ربيع الأول</span>
      </template>
      <b-list-group flush>
        <b-list-group-item
          v-b-tooltip.hover.bottom="'Description here for OTD'"
          action
          href="#"
        >
          Test
          <i class="fa fa-angle-left" />
        </b-list-group-item>
        <b-list-group-item
          v-b-tooltip.hover.bottom="'Description here for OTD'"
          action
          href="#"
        >
          Test 2
          <i class="fa fa-angle-left" />
        </b-list-group-item>
      </b-list-group>
      <b-card-body>
        <b-button variant="link" href="#">
          {{ $t("learn more") }}
          <i class="fa fa-angle-double-left" />
        </b-button>
      </b-card-body>
    </b-card>
  </div>
</template>

<script>
export default {
  name: "OnThisDay",
};
</script>

<style lang="scss"></style>
