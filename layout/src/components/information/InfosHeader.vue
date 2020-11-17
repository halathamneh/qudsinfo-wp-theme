<template>
  <div class="infos-header">
    <b-nav pills>
      <b-nav-text class="title">{{ $t("our info") }}:</b-nav-text>
      <b-nav-item
        :to="{ name: 'written-cat' }"
        :active="['written-index', 'written-cat'].includes($route.name)"
      >
        <fa :icon="['fas', 'eye']" />
        {{ $t("written") }}
      </b-nav-item>
      <b-nav-item
        :to="localePath('information-audio')"
        :active="$route.path === localePath('information-audio')"
      >
        <fa :icon="['fas', 'headphones']" />
        {{ $t("audio") }}
      </b-nav-item>
      <b-nav-item
        :to="localePath('information-video')"
        :active="$route.path === localePath('information-video')"
      >
        <fa :icon="['fas', 'video']" />
        {{ $t("video") }}
      </b-nav-item>
    </b-nav>
  </div>
</template>

<script>
export default {
  name: "InfosHeader",
  methods: {
    localePath: (routeName) => routeName,
  },
};
</script>

<style lang="scss" scoped></style>
