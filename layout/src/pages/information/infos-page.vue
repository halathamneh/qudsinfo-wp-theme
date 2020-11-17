<template>
  <div class="flex-layout-page">
    <infos-header />
    <router-view />
  </div>
</template>

<script>
import InfosHeader from "@/components/information/InfosHeader";
export default {
  name: "InfosPage",
  components: { InfosHeader },
};
</script>
