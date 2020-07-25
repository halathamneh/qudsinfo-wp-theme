import i18n from "../../lang/i18n";

export default [
  {
    title: i18n.t("our info"),
    description: "معلومات مقدسية مكتوبة ومسموعة ومرئية",
    image: require("@/images/services/our_info.svg"),
    href: "/our-info",
  },
  {
    title: i18n.t("news"),
    description: "كن أول من يعرف أخبار القدس والمسجد الأقصى",
    image: require("@/images/services/news.svg"),
    href: "/qudsnews",
  },
  {
    title: i18n.t("library"),
    description: "أكبر مكتبة الكترونية مختصة في المسجد الأقصى",
    image: require("@/images/services/library.svg"),
    href: "/library",
  },
  {
    title: i18n.t("know quds"),
    description: "تعرف عن قرب على معالم الأقصى والبلدة القديمة",
    image: require("@/images/services/knowquds.svg"),
    href: "/knowquds/alaqsa-mosque",
  },
  {
    title: i18n.t("quizzes"),
    description: "اختبر معلوماتك المقدسية وتحدى أصدقاءك",
    image: require("@/images/services/quizzes.svg"),
    href: null,
  },
  {
    title: i18n.t("landmarks"),
    description: "صور لجميع معالم الأقصى والبلدة القديمة",
    image: require("@/images/services/milestones.svg"),
    href: "/photos",
  },
  {
    title: i18n.t("your aqsa distance"),
    description: "اعرف بعدك عن الأقصى من أي نقطة في العالم",
    image: require("@/images/services/aqsadistance.svg"),
    href: "#aqsa-distance-section",
  },
  {
    title: i18n.t("wallpapers"),
    description: "ابحث عن صورة الأقصى المناسبة لهاتفك أو كمبيوترك",
    image: require("@/images/services/wallpapers.svg"),
    href: "/wallpapers",
  },
  {
    title: i18n.t("on this day"),
    description: "تعرف على الأحداث التي حصلت في المسجد الأقصى والقدس",
    image: require("@/images/services/otd.svg"),
    href: null,
  },
];
