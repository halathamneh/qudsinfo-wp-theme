<template>
  <div class="on-this-day-banner">
    <div class="otd-title">{{ $t("otd-title") }}</div>
    <b-card no-body class="rounded no-shadow">
      <template v-slot:header>
        <b>{{ $d(date, "short") }}</b>
        <br />
        <span>{{ $t("hijri") }}: {{ hijriDate }}</span>
      </template>
      <b-list-group v-if="events.length > 0" flush>
        <b-list-group-item v-for="(event, i) in events" :key="i">
          {{ event.title }}
          <div class="mt-2 small text-muted">
            {{ event.content }}
          </div>
        </b-list-group-item>
      </b-list-group>
      <div v-else class="text-center text-muted py-3">
        {{ $t("no events") }}
      </div>
      <b-card-body></b-card-body>
    </b-card>
  </div>
</template>

<script>
import { getShortHijri } from "../../js/utils";
import { getTodayEvents } from "../../api/getOnThisDay";

export default {
  name: "OnThisDay",
  data: () => ({
    date: new Date(),
    hijriDate: getShortHijri(new Date()),
    events: [],
  }),
  mounted() {
    getTodayEvents().then((events) => (this.events = events));
  },
};
</script>

<style lang="scss"></style>
