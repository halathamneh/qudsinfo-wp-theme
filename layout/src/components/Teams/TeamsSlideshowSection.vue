<template>
  <section class="teams-slider-section">
    <div class="container">
      <div class="section-title">
        <h2>{{ $t("teams") }}</h2>
      </div>
      <div v-if="teams" class="section-content">
        <team-slideshow-item v-for="(team, i) in teams" :key="i" :item="team" />
      </div>
      <span v-else>Loading...</span>
    </div>
  </section>
</template>

<script>
import TeamSlideshowItem from "./TeamSlideshowItem";
import fetchTeams from "../../api/fetchTeams";
import DotsHorizontalLoader from "../loaders/DotsHorizontalLoader";

export default {
  name: "TeamsSlideshowSection",
  components: { DotsHorizontalLoader, TeamSlideshowItem },
  data: () => ({
    teams: null,
  }),
  mounted() {
    fetchTeams().then((teams) => (this.teams = teams));
  },
};
</script>
