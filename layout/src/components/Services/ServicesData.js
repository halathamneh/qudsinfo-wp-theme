import i18n from "../../lang/i18n";

export default {
  our_info: {
    title: i18n.t("our info"),
    description: i18n.t("infos description short"),
    image: require("@/images/services/our_info.svg"),
    href: "/our-info",
  },
  news: {
    title: i18n.t("news"),
    description: i18n.t("news description short"),
    image: require("@/images/services/news.svg"),
    href: "/qudsnews",
  },
  library: {
    title: i18n.t("library"),
    description: i18n.t("library description short"),
    image: require("@/images/services/library.svg"),
    href: "/library",
  },
  know_quds: {
    title: i18n.t("know quds"),
    description: i18n.t("knowquds description short"),
    image: require("@/images/services/knowquds.svg"),
    href: "/knowquds/alaqsa-mosque",
  },
  quizzes: {
    title: i18n.t("quizzes"),
    description: i18n.t("quizzes description short"),
    image: require("@/images/services/quizzes.svg"),
    href: null,
  },
  landmarks: {
    title: i18n.t("landmarks"),
    description: i18n.t("landmarks description short"),
    image: require("@/images/services/milestones.svg"),
    href: "/photos",
  },
  aqsa_distance: {
    title: i18n.t("your aqsa distance"),
    description: i18n.t("aqsa distance description short"),
    image: require("@/images/services/aqsadistance.svg"),
    href: "#aqsa-distance-section",
  },
  wallpapers: {
    title: i18n.t("wallpapers"),
    description: i18n.t("wallpapers description short"),
    image: require("@/images/services/wallpapers.svg"),
    href: "/wallpapers",
  },
  onthisday: {
    title: i18n.t("on this day"),
    description: i18n.t("on this day description short"),
    image: require("@/images/services/otd.svg"),
    href: null,
  },
};
