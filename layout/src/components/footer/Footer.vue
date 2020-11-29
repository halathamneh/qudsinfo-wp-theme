<template>
  <footer>
    <img
      data-src="/wp-content/themes/qudsinfo-wp-theme/layout/src/images/bg2.jpg"
      class="overlay-image lazy"
    />
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 mb-4 mb-lg-0">
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
              $t("Privacy Policy")
            }}</a>
          </div>
        </div>
        <div class="col-12 col-sm-4 col-lg-2">
          <footer-links
            :title="$t('our services')"
            :links="servicesLinks"
            class="mx-4 mx-sm-0"
          />
        </div>
        <div class="footer-links col-12 col-sm-4 col-lg-2">
          <footer-links
            :title="$t('teams')"
            :links="aboutLinks"
            class="mx-4 mx-sm-0"
          />
        </div>
        <div class="col-12 col-sm-4 col-lg-2">
          <footer-contact class="mx-4 mx-sm-0" />
        </div>
        <div class="col-12 d-block d-lg-none">
          <div class="copyrights mt-5 mx-4 mx-sm-0">
            <b>{{ $t("copyrights") }} {{ new Date().getFullYear() }}</b>
            <a href="#" class="privacy-policy-link">{{
              $t("Privacy Policy")
            }}</a>
          </div>
        </div>
      </div>
    </div>
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
