<template>
  <section class="info-of-today-section">
    <div class="container">
      <div class="row">
        <div class="mb-4 col-lg-9">
          <info-of-today />
        </div>
        <div class="mb-4 col-lg-3">
          <slot name="extra" />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import InfoOfToday from "./InfoOfToday";
export default {
  name: "InfoOfTodaySection",
  components: { InfoOfToday },
};
</script>
