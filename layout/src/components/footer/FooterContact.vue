<template>
  <div class="footer-contact">
    <h3 class="footer-section-title">{{ $t("contact") }}</h3>
    <div v-if="contactItems.phone" class="footer-contact-item">
      <i class="fa fa-phone-square" />
      <b>{{ $t("phone") }}</b>
      <a :href="contactItems.phone.href" class="d-block">{{
        contactItems.phone.label
      }}</a>
    </div>
    <div v-if="contactItems.whatsapp" class="footer-contact-item">
      <i class="fa fa-whatsapp" />
      <b>{{ $t("whatsapp") }}</b>
      <a :href="contactItems.whatsapp.href" class="d-block">{{
        contactItems.phone.label
      }}</a>
    </div>
    <div v-if="contactItems.email" class="footer-contact-item">
      <i class="fa fa-envelope-square" />
      <b>{{ $t("email") }}</b>
      <a :href="contactItems.email.href" class="d-block">{{
        contactItems.email.label
      }}</a>
    </div>
  </div>
</template>

<script>
import contactItems from "./contact.json";
export default {
  name: "FooterContact",
  data: () => ({
    contactItems,
  }),
};
</script>
