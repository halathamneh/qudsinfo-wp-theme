<template>
  <div :class="{ 'footer-links': true, toggled }">
    <h3 @click="toggleLinks" class="footer-section-title">
      {{ title }}
      <i :class="{ 'fa fa-angle-down': true, rotate: toggled }" />
    </h3>
    <transition
      @before-enter="beforeEnter"
      @enter="enter"
      @before-leave="beforeLeave"
      @leave="leave"
      name="accordion"
    >
      <ul v-show="toggled" class="links-list">
        <li v-for="(link, i) in links" :key="i">
          <i class="fa fa-angle-left" />
          <a :href="link.href">{{ $t(link.title) }}</a>
        </li>
      </ul>
    </transition>
  </div>
</template>

<script>
export default {
  name: "FooterLinks",
  props: {
    links: {
      type: Array,
      default: () => [],
    },
    title: {
      type: String,
      default: () => "",
    },
  },
  data: () => ({
    toggled: true,
  }),
  mounted() {
    this.toggled = this.$mq !== "sm";
  },
  methods: {
    toggleLinks() {
      if (this.$mq !== "sm") {
        return;
      }
      this.toggled = !this.toggled;
    },
    beforeEnter(el) {
      el.style.height = "0";
    },
    enter(el) {
      el.style.height = el.scrollHeight + "px";
    },
    beforeLeave(el) {
      el.style.height = el.scrollHeight + "px";
    },
    leave(el) {
      el.style.height = "0";
    },
  },
};
</script>
