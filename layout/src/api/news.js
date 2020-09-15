import http from "./index";

export const getLatestNews = () =>
  http.get("/news/latest").then((res) => res.data);
