import http from "./index";
import i18n from "../lang/i18n";
import lecturesImage from "@/images/teams/lectures.svg";
import mediaImage from "@/images/teams/media.svg";
import contentImage from "@/images/teams/content.svg";
import newsImage from "@/images/teams/news.svg";
import { currentLang } from "../lang/utils";

const images = {
  lectures: lecturesImage,
  media: mediaImage,
  content: contentImage,
  news: newsImage,
};

const trimNumber = (number) => {
  number = parseInt(number);
  if (number < 10000) return `<span class="stats-item-number">${number}</span>`;
  if (number < 1000000)
    return `<span class="stats-item-number">${(number / 1000).toFixed(
      0
    )}+</span><span class="stats-item-unit">${
      currentLang === "ar" ? "ألف" : "K"
    }</span>`;
  return `<span class="stats-item-number">${(number / 1000000).toFixed(
    0
  )}+</span><span class="stats-item-unit">${
    currentLang === "ar" ? "مليون" : "M"
  }</span>`;
};

export default () => {
  return http.get("/teams").then((res) =>
    Object.entries(res.data).map(([name, data]) => {
      const team = {
        name,
        ...data,
        image: images[name],
      };
      team.stats = team.stats.map((stat) => ({
        ...stat,
        number: trimNumber(stat.number),
        label: i18n.t(stat.name),
      }));

      return team;
    })
  );
};
