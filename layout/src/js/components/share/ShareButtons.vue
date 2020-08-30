<template>
  <div class="share-buttons">
    <div v-show="label" class="share-buttons-label">{{ label }}</div>
    <div class="share-buttons-list">
      <ShareNetwork
        v-for="network in networks"
        :network="network.network"
        :key="network.network"
        :style="{ backgroundColor: network.color }"
        :url="url"
        :title="title"
        :description="description"
        :quote="quote"
        :hashtags="hashtags"
        :twitterUser="twitterUser"
      >
        <i :class="network.icon"></i>
        <span>{{ network.name }}</span>
      </ShareNetwork>
    </div>
  </div>
</template>

<script>
import { ShareNetwork } from "vue-social-sharing";

export default {
  name: "ShareButtons",
  components: { ShareNetwork },
  props: {
    label: String,
    url: {
      type: String,
      default: () => document.location.href,
    },
    title: String,
    description: String,
    quote: String,
    hashtags: String,
    twitterUser: String,
  },
  data() {
    return {
      networks: [
        // { network: 'baidu', name: 'Baidu', icon: 'fas fah fa-lg fa-paw', color: '#2529d8' },
        // { network: 'buffer', name: 'Buffer', icon: 'fab fah fa-lg fa-buffer', color: '#323b43' },
        {
          network: "facebook",
          name: "",
          icon: "fa fa-facebook-f",
          color: "#1877f2",
        },
        // { network: 'evernote', name: 'Evernote', icon: 'fab fah fa-lg fa-evernote', color: '#2dbe60' },
        {
          network: "twitter",
          name: "",
          icon: "fa fa-twitter",
          color: "#1da1f2",
        },
        // { network: 'flipboard', name: 'Flipboard', icon: 'fab fah fa-lg fa-flipboard', color: '#e12828' },
        // { network: 'hackernews', name: 'HackerNews', icon: 'fab fah fa-lg fa-hacker-news', color: '#ff4000' },
        // { network: 'instapaper', name: 'Instapaper', icon: 'fas fah fa-lg fa-italic', color: '#428bca' },
        // { network: 'line', name: 'Line', icon: 'fab fah fa-lg fa-line', color: '#00c300' },
        // { network: 'linkedin', name: 'LinkedIn', icon: 'fab fah fa-lg fa-linkedin', color: '#007bb5' },
        // { network: 'odnoklassniki', name: 'Odnoklassniki', icon: 'fab fah fa-lg fa-odnoklassniki', color: '#ed812b' },
        {
          network: "telegram",
          name: "",
          icon: "fa fa-telegram",
          color: "#0088cc",
        },
        // { network: 'pocket', name: 'Pocket', icon: 'fab fah fa-lg fa-get-pocket', color: '#ef4056' },
        // { network: 'quora', name: 'Quora', icon: 'fab fah fa-lg fa-quora', color: '#a82400' },
        // { network: 'reddit', name: 'Reddit', icon: 'fab fah fa-lg fa-reddit-alien', color: '#ff4500' },
        // { network: 'skype', name: 'Skype', icon: 'fab fah fa-lg fa-skype', color: '#00aff0' },
        // { network: 'sms', name: 'SMS', icon: 'far fah fa-lg fa-comment-dots', color: '#333333' },
        // { network: 'stumbleupon', name: 'StumbleUpon', icon: 'fab fah fa-lg fa-stumbleupon', color: '#eb4924' },
        {
          network: "whatsapp",
          name: "",
          icon: "fa fa-whatsapp",
          color: "#25d366",
        },
        // { network: 'tumblr', name: 'Tumblr', icon: 'fab fah fa-lg fa-tumblr', color: '#35465c' },
        {
          network: "pinterest",
          name: "",
          icon: "fa fa-pinterest",
          color: "#bd081c",
        },
        // { network: 'viber', name: 'Viber', icon: 'fab fah fa-lg fa-viber', color: '#59267c' },
        // { network: 'vk', name: 'Vk', icon: 'fab fah fa-lg fa-vk', color: '#4a76a8' },
        // { network: 'weibo', name: 'Weibo', icon: 'fab fah fa-lg fa-weibo', color: '#e9152d' },
        {
          network: "email",
          name: "",
          icon: "fa fa-envelope",
          color: "#333333",
        },
        // { network: 'wordpress', name: 'Wordpress', icon: 'fab fah fa-lg fa-wordpress', color: '#21759b' },
        // { network: 'xing', name: 'Xing', icon: 'fab fah fa-lg fa-xing', color: '#026466' },
        // { network: 'yammer', name: 'Yammer', icon: 'fab fah fa-lg fa-yammer', color: '#0072c6' },
        // { network: 'fakeblock', name: 'Custom Network', icon: 'fab fah fa-lg fa-vuejs', color: '#41b883' }
      ],
    };
  },
};
</script>

<style lang="scss">
.share-buttons,
.share-buttons-list {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  align-items: center;
}

a[class^="share-network-"] {
  flex: none;
  color: #ffffff;
  background-color: #333;
  border-radius: 50px;
  width: 35px;
  height: 35px;
  overflow: hidden;
  display: flex;
  flex-direction: row;
  align-content: center;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  margin: 0 6px 0 0;
  transition: all 0.2s;
  &:hover {
    color: #fff;
    box-shadow: 0 5px 15px rgba(120, 120, 120, 0.75);
    transform: translateY(-2px);
  }
}
</style>
