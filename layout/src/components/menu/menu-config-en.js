import InfosDropdown from "./InfosMenu/InfosDropdown";
import InfosSecondaryDropdown from "./InfosMenu/InfosSecondaryDropdown";
import KnowqudsDropdown from "./KnowqudsMenu/KnowqudsDropdown";
import KnowqudsSecondaryDropdown from "./KnowqudsMenu/KnowqudsSecondaryDropdown";
import NewsDropdown from "./NewsMenu/NewsDropdown";
import NewsSecondaryDropdown from "./NewsMenu/NewsSecondaryDropdown";
import WallpapersDropdown from "./WallpapersMenu/WallpapersDropdown";
import LibraryDropdown from "./LibraryMenu/LibraryDropdown";
import LandmarksDropdown from "./PicsMenu/LandmarksDropdown";
import LandmarksSecondaryDropdown from "./PicsMenu/LandmarksSecondaryDropdown";
import TeamsDropdown from "./TeamsMenu/TeamsDropdown";
import AboutDropdown from "./AboutMenu/AboutDropdown";
import AboutSecondaryDropdown from "./AboutMenu/AboutSecondaryDropdown";
import i18n from "../../lang/i18n";
import InfosMobileMenu from "./InfosMenu/InfosMobileMenu";

export default [
  {
    title: i18n.t("our info"),
    dropdown: "infos",
    content: InfosDropdown,
    secondary: InfosSecondaryDropdown,
    mobile: InfosMobileMenu,
    url: "/our-info",
    element: "a",
    attributes: {
      href: "/our-info",
    },
    subItems: [
      {
        title: i18n.t("written info"),
        url: "/our-info",
        icon: "fa fa-database",
      },
      {
        title: i18n.t("audio info"),
        url: "/our-info/audio",
        icon: "fa fa-headphones",
      },
      {
        title: i18n.t("video info"),
        url: "/our-info/videos",
        icon: "fa fa-video-camera",
      },
    ],
  },
  {
    title: i18n.t("know quds"),
    dropdown: "knowquds",
    content: KnowqudsDropdown,
    secondary: KnowqudsSecondaryDropdown,
    url: "/knowquds",
    element: "a",
    attributes: {
      href: "/knowquds",
    },
    subItems: [
      {
        title: i18n.t("alaqsa mosque milestones"),
        url: "/knowquds/alaqsa-mosque",
      },
      {
        title: i18n.t("old city milestones"),
        url: "/knowquds/old-city",
      },
    ],
  },
  {
    title: i18n.t("wallpapers"),
    dropdown: "wallpapers",
    content: WallpapersDropdown,
    url: "/wallpapers",
    icon: "fa fa-picture-o",
    element: "a",
    attributes: {
      href: "/wallpapers",
    },
  },
  {
    title: i18n.t("landmarks"),
    dropdown: "landmarks",
    content: LandmarksDropdown,
    secondary: LandmarksSecondaryDropdown,
    url: "/photos",
    element: "a",
    attributes: {
      href: "/photos",
    },
    subItems: [
      {
        title: i18n.t("aqsa landmarks"),
        url: "/photos/#/al-aqsa-milestones",
      },
      {
        title: i18n.t("old city landmarks"),
        url: "/photos/#/the-old-town-milestones",
      },
      {
        title: i18n.t("beauty landmarks"),
        url: "/photos/#/images-of-jerusalem",
      },
    ],
  },
  {
    title: i18n.t("teams"),
    dropdown: "teams",
    content: TeamsDropdown,
    subItems: [
      {
        title: i18n.t("lectures team"),
        url: "/lectures-team",
        icon: "fa fa-graduation-cap",
      },
      {
        title: i18n.t("media team"),
        url: "/socialmedia-team",
        icon: "fa fa-globe",
      },
      {
        title: i18n.t("news team"),
        url: "/news-team",
        icon: "fa fa-newspaper-o",
      },
      {
        title: i18n.t("content team"),
        url: "/content-team",
        icon: "fa fa-file-text",
      },
      {
        title: i18n.t("site team"),
        url: "/site-team",
        icon: "fa fa-coffee",
      },
    ],
    secondaryItems: [
      {
        title: i18n.t("join us"),
        url: "/join-us",
      },
    ],
  },
  {
    title: i18n.t("about"),
    dropdown: "about",
    content: AboutDropdown,
    secondary: AboutSecondaryDropdown,
  },
];
