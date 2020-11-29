<template>
  <div class="infos-header">
    <ul class="nav nav-pills">
      <li class="navbar-text title">{{ $t("our info") }}:</li>
      <li class="nav-item">
        <router-link
          :class="{
            'nav-link': true,
            active: ['written-index', 'written-cat'].includes($route.name),
          }"
          :to="{ name: 'written-cat' }"
        >
          <fa :icon="['fas', 'eye']" />
          {{ $t("written") }}
        </router-link>
      </li>
      <li class="nav-item">
        <router-link
          :class="{
            'nav-link': true,
            active: $route.path === localePath('information-audio'),
          }"
          :to="localePath('information-audio')"
        >
          <fa :icon="['fas', 'headphones']" />
          {{ $t("audio") }}
        </router-link>
      </li>
      <li class="nav-item">
        <router-link
          :class="{
            'nav-link': true,
            active: $route.path === localePath('information-video'),
          }"
          :to="localePath('information-video')"
        >
          <fa :icon="['fas', 'video']" />
          {{ $t("video") }}
        </router-link>
      </li>
    </ul>
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
