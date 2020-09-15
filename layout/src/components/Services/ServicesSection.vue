<template>
  <section class="services-section">
    <div class="container">
      <div class="section-title">
        <h2>{{ $t("our services") }}</h2>
      </div>
      <div class="section-content">
        <div v-if="!loading" class="row justify-content-center">
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
import fetchEnabledServices from "../../api/fetchEnabledServices";

export default {
  name: "ServicesSection",
  components: { ServiceItem },
  data: () => ({
    loading: true,
    services: [],
  }),
  mounted() {
    fetchEnabledServices().then((enabledServices) => {
      enabledServices.forEach((serviceName) =>
        this.services.push(ServiceData[serviceName])
      );
      this.loading = false;
    });
  },
};
</script>
