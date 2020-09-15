<template>
  <div>
    <section class="info-of-today-section">
      <div class="container">
        <div class="row">
          <div class="mb-4 col-lg-9">
            <info-of-today />
          </div>
          <div class="mb-4 col-lg-3">
            <on-this-day />
          </div>
        </div>
      </div>
    </section>
    <aqsa-distance-section />
    <services-section />
    <teams-slideshow-section />
  </div>
</template>

<script>
import InfoOfToday from "../components/iot/InfoOfToday";
import OnThisDay from "../components/on-this-day/OnThisDay";
import AqsaDistanceSection from "../components/aqsa-distance/AqsaDistanceSection";
import ServicesSection from "../components/Services/ServicesSection";
import TeamsSlideshowSection from "../components/Teams/TeamsSlideshowSection";

export default {
  name: "HomePage",
  components: {
    TeamsSlideshowSection,
    ServicesSection,
    AqsaDistanceSection,
    OnThisDay,
    InfoOfToday,
  },
};
</script>
