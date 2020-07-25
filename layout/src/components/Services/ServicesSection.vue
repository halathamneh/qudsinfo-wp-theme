<template>
  <section class="services-section">
    <div class="container">
      <div class="section-title">
        <h2>{{ $t("our services") }}</h2>
      </div>
      <div class="section-content">
        <div class="row">
          <div v-for="(service, i) in services" :key="i" class="col-md-4">
            <service-item :item="service" />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import ServiceItem from "./ServiceItem";
import ServiceData from "./ServicesData";

export default {
  name: "ServicesSection",
  components: { ServiceItem },
  data: () => ({
    services: ServiceData,
  }),
};
</script>
