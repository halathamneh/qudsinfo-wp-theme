import http from "./index";

export default (lat, lon) =>
  http
    .post("/aqsa-distance/", {
      lat,
      lon,
    })
    .then((res) => {
      const rawDistance =
        res.data && res.data.result ? parseFloat(res.data.result) : 0;
      return Math.round(rawDistance * 100) / 100;
    });
