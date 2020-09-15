<template>
  <section class="info-of-today-section">
    <b-container>
      <b-row>
        <b-col lg="9" class="mb-4">
          <info-of-today />
        </b-col>
        <b-col lg="3" class="mb-4">
          <slot name="extra" />
        </b-col>
      </b-row>
    </b-container>
  </section>
</template>

<script>
import InfoOfToday from './InfoOfToday'
export default {
  name: 'InfoOfTodaySection',
  components: { InfoOfToday }
}
</script>
