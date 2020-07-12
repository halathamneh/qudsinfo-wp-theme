<template>
  <div class="follow-buttons">
    <facebook-btn />
    <instagram-btn />
    <telegram-btn />
    <snapchat-btn />
    <soundcloud-btn />
    <youtube-btn />
    <askfm-btn />
    <whatsapp-btn />
  </div>
</template>

<script>
import FacebookBtn from "./FacebookBtn";
import InstagramBtn from "./InstagramBtn";
import TelegramBtn from "./TelegramBtn";
import SoundcloudBtn from "./SoundcloudBtn";
import SnapchatBtn from "./SnapchatBtn";
import YoutubeBtn from "./YoutubeBtn";
import AskfmBtn from "./AskfmBtn";
import WhatsappBtn from "./WhatsappBtn";
export default {
  name: "FollowButtons",
  components: {
    WhatsappBtn,
    AskfmBtn,
    YoutubeBtn,
    SnapchatBtn,
    SoundcloudBtn,
    TelegramBtn,
    InstagramBtn,
    FacebookBtn,
  },
};
</script>

<style lang="scss">
.follow-buttons {
  display: flex;
  margin-top: 10px;
  a {
    margin: 0 8px;
  }
}
</style>
