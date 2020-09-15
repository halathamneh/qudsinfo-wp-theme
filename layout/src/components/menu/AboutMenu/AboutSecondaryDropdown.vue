<template>
  <div class="wrap-content">
    <ul>
      <li>
        <small class="font-weight-bold">{{ $t("follow us") }}</small>
        <follow-buttons />
      </li>
    </ul>
  </div>
</template>

<script>
import FollowButtons from "../../FollowButtons/FollowButtons";
export default {
  name: "AboutSecondaryDropdown",
  components: { FollowButtons },
};
</script>

<style scoped lang="scss">
.wrap-content {
  padding: 24px 16px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
}
li {
  font-size: 12px;
  margin-bottom: 6px;
  i.fa {
    margin: 0 8px;
  }
  a {
    white-space: nowrap;
    padding: 4px 8px 4px 18px;
    display: inline-block;
    transition: background-color 0.25s;
    &:hover {
      border-radius: 5px;
      background-color: #f6f9fc;
      text-decoration: none;
    }
  }
}
</style>
