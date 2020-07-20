<template>
  <section
    :class="{ 'overlay-visible': status !== 'idle' }"
    class="aqsa-distance-section"
  >
    <transition :appear="true" name="aqsa-distance-overlay">
      <aqsa-distance-overlay
        v-show="status !== 'idle'"
        :cancel="cancel"
        :status="status"
        :statusMessage="statusMessage"
        :result="result"
      />
    </transition>
    <dome-svg ref="dome-svg" class="dome-svg" />
    <div class="section-art">
      <aqsa-distance-art />
    </div>

    <div class="container">
      <div class="section-header">
        <div class="pin-image-wrapper">
          <img
            ref="pin-image"
            class="pin-image"
            src="@/images/pin.png"
            alt=""
          />
        </div>
        {{ $t("your aqsa distance") }}
      </div>
      <div class="section-content">
        <button
          id="aqsa-distance-button"
          @click="aqsaDistanceClick"
          class="btn btn-lg btn-aqsa-distance"
        >
          {{ $t("click aqsa distance") }}
        </button>
      </div>
    </div>
  </section>
</template>

<script>
import AqsaDistanceArt from "./AqsaDistanceArt";
import AqsaDistanceOverlay from "./AqsaDistanceOverlay";
import DomeSvg from "@/images/dome.svg?inline";
import { getUserLocation } from "./aqsa-distance.utils";
import calculateDistance from "../../api/calculateDistance";

export default {
  name: "AqsaDistanceSection",
  components: { AqsaDistanceOverlay, AqsaDistanceArt, DomeSvg },
  data: () => ({
    status: "idle",
    statusMessage: "",
    result: 0,
  }),
  methods: {
    aqsaDistanceClick() {
      document.body.classList.add("modal-open");
      this.setPositionItems();
      this.status = "in-progress";
      this.statusMessage = this.$t("getting your location");
      getUserLocation()
        .then((position) => this.findDistance(position))
        .catch((errorMessage) => {
          this.status = "fail";
          this.statusMessage = this.$t(errorMessage);
        });
    },
    findDistance({ coords: { latitude: lat, longitude: lon } }) {
      this.statusMessage = this.$t("calculating distance, please wait");
      calculateDistance(lat, lon)
        .then((distance) => {
          this.status = "success";
          this.result = distance;
        })
        .catch(() => {
          this.status = "fail";
          this.statusMessage = this.$t("something went wrong please try again");
        });
    },
    cancel() {
      document.body.classList.remove("modal-open");
      this.status = "idle";
    },
    setPositionItems() {
      const domeRef = this.$refs["dome-svg"];
      const domeRect = domeRef.getBoundingClientRect();
      domeRef.style.top = `${domeRect.top}px`;
      domeRef.style.left = `${domeRect.left}px`;

      const pinRef = this.$refs["pin-image"];
      const pinRect = pinRef.getBoundingClientRect();
      pinRef.style.top = `${pinRect.top}px`;
      pinRef.style.left = `${pinRect.left}px`;

      setTimeout(() => {
        this.clearItemsPosition();
      }, 1);
    },
    clearItemsPosition() {
      this.$refs["dome-svg"].style.top = "";
      this.$refs["dome-svg"].style.left = "";
      this.$refs["pin-image"].style.top = "";
      this.$refs["pin-image"].style.left = "";
    },
  },
};
</script>
