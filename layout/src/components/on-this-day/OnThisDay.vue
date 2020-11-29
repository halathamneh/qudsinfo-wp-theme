<template>
  <div class="on-this-day-banner">
    <div class="otd-title">{{ $t("otd-title") }}</div>
    <div class="card rounded no-shadow">
      <div class="card-header">
        <b>{{ $d(date, "short") }}</b>
        <br />
        <span>{{ $t("hijri") }}: {{ hijriDate }}</span>
      </div>
      <div class="list-group list-group-flush" v-if="events.length > 0">
        <div class="list-group-item" v-for="(event, i) in events" :key="i">
          {{ event.title }}
          <div class="mt-2 small text-muted">
            {{ event.content }}
          </div>
        </div>
      </div>
      <div v-else class="text-center text-muted py-3">
        {{ $t("no events") }}
      </div>
    </div>
  </div>
</template>

<script>
import { getShortHijri } from "@/legacy/utils";
import { getTodayEvents } from "@/api/getOnThisDay";

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
