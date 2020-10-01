<template>
  <div class="knowquds-page pt-4">
    <div class="knowquds-page-header">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <h2>{{ $t("know quds") }}</h2>
            <p>{{ $t("knowquds description") }}</p>
          </div>
          <div class="col-md-6">
            <KnowqudsImage />
          </div>
        </div>
      </div>
    </div>

    <div class="knowquds-types">
      <div class="container">
        <h4>{{ $t("ready to knowquds") }}</h4>
        <div
          v-if="!loading"
          class="row"
        > 
          <div
            v-for="term in terms"
            :key="term.id"
            class="col-md-6"
          >
            <KnowqudsListItem
              :title="term.label"
              :btn-text="metadata[term.slug].btnText"
              :image="metadata[term.slug].image"
              :term="term"
              :description="term.description"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import KnowqudsListItem from './KnowqudsListItem';
import KnowqudsImage from '../../images/knowquds/knowquds.svg?inline';
import AqsaImage from '../../images/knowquds/aqsa.png';
import OldTownImage from '../../images/knowquds/old-city.jpg';
import { getTerms } from '../../api/knowquds';

export default {
  name: 'KnowqudsTerms',
  components: { KnowqudsListItem, KnowqudsImage },
  data: () => ({
    terms: [],
    loading: true,
    metadata: {
      'alaqsa-mosque': {
        btnText: 'دخول للمسجد الأقصى',
        image: AqsaImage,
      },
      'old-city': {
        btnText: 'دخول للبلدة القديمة',
        image: OldTownImage,
      },
    },
  }),
  mounted () {
    getTerms().then((terms) => {
      this.terms = terms;
      this.loading = false;
    });
  },
};
</script>

<style lang="scss">
.knowquds-page-header {
  h2 {
    margin: 16px 0 32px;
    font-weight: bold;
  }
  svg {
    max-height: 400px;
  }
}
.knowquds-types {
  padding: 64px 0;
  background-color: #2d2d42;
  color: #aaa;
  h4 {
    margin-bottom: 32px;
    font-weight: bold;
    text-align: center;
  }
}
</style>
