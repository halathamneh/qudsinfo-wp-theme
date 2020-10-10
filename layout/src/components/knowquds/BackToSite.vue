<template>
  <router-link :to="{ name: 'list-all-knowquds' }" class="back-to-site">
    <ArrowIcon />
    {{ $t("back") }}
    <img
      src="https://cdn.qudsinfo.com/wp-content/uploads/2016/05/logo.png"
      :alt="$t('qudsinfo')"
      :title="$t('qudsinfo')"
    />
  </router-link>
</template>

<script>
import ArrowIcon from "../../images/arrow.svg?inline";
export default {
  name: "BackToSite",
  components: { ArrowIcon },
};
</script>

<style lang="scss" scoped>
.back-to-site {
  position: absolute;
  top: 0;
  right: 0;
  z-index: 30;
  padding: 8px 16px;
  border-radius: 0 0 0 10px;
  display: flex;
  align-items: center;
  font-size: 12px;
  color: #444;
  background-color: #fff;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2), 0 -1px 0px rgba(0, 0, 0, 0.02),
    0 -2px 6px rgba(80, 80, 80, 0.2);
  transition: all 0.2s;
  svg {
    width: 24px;
    height: 24px;
    transform: rotate(-90deg);
    margin-right: 8px;
  }
  img {
    width: 60px;
    margin-left: 8px;
  }
  &:hover {
    text-decoration: none;
    background-color: rgba(200, 200, 200, 1);
    color: #333;
    svg {
      color: #666;
    }
  }

  .rtl & {
    left: 0;
    right: auto;
    border-radius: 0 0 10px;
    svg {
      transform: rotate(90deg);
      margin-left: 8px;
      margin-right: 0;
    }
    img {
      margin-right: 8px;
      margin-left: 0;
    }
  }
}
</style>
