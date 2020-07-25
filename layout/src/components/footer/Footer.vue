<template>
  <footer>
    <img
      data-src="/wp-content/themes/qudsinfo-wp-theme/layout/src/images/bg2.jpg"
      class="overlay-image lazy"
    />
    <b-container>
      <b-row>
        <b-col lg="6" sm="12" cols="12" class="mb-4 mb-lg-0">
          <div
            class="footer-brand justify-content-center justify-content-md-start"
          >
            <img src="@/images/logo.png" alt="Logo" />
            <div class="footer-slogan">
              <h3>Qudsinfo.com</h3>
              <span>{{ $t("slogan") }}</span>
            </div>
          </div>
          <follow-buttons
            class="mt-4 mb-3 justify-content-center justify-content-md-start"
          />
          <div class="copyrights mt-5 d-none d-lg-block">
            <b>{{ $t("copyrights") }} {{ new Date().getFullYear() }}</b>
            <a href="/privacy-policy" class="privacy-policy-link">{{
              $t("privacy policy")
            }}</a>
          </div>
        </b-col>
        <b-col cols="12" sm="4" lg="2">
          <footer-links
            :title="$t('services')"
            :links="servicesLinks"
            class="mx-4 mx-sm-0"
          />
        </b-col>
        <b-col cols="12" sm="4" lg="2" class="footer-links">
          <footer-links
            :title="$t('about')"
            :links="aboutLinks"
            class="mx-4 mx-sm-0"
          />
        </b-col>
        <b-col cols="12" sm="4" lg="2">
          <footer-contact class="mx-4 mx-sm-0" />
        </b-col>
        <b-col cols="12" class="d-block d-lg-none">
          <div class="copyrights mt-5 mx-4 mx-sm-0">
            <b>{{ $t("copyrights") }} {{ new Date().getFullYear() }}</b>
            <a href="#" class="privacy-policy-link">{{
              $t("privacy policy")
            }}</a>
          </div>
        </b-col>
      </b-row>
    </b-container>
  </footer>
</template>

<script>
import FollowButtons from "../FollowButtons/FollowButtons";
import FooterLinks from "./FooterLinks";
import FooterContact from "./FooterContact";
import servicesLinks from "./services.json";
import aboutLinks from "./about.json";
export default {
  name: "Footer",
  components: { FooterContact, FooterLinks, FollowButtons },
  data: () => ({
    servicesLinks,
    aboutLinks,
  }),
};
</script>
