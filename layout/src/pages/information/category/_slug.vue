<template>
  <category-body :slug="slug" />
</template>

<script>
import CategoryBody from '../../../components/information/CategoryBody'
export default {
  name: 'InfoCatSlug',
  components: { CategoryBody },
  layout: 'written-info',
  data() {
    return {
      slug: this.$route.params.slug
    }
  }
}
</script>
