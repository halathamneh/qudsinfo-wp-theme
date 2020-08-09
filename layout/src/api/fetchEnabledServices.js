import http from "./index";

export default () => {
  return http.get("/services").then((res) => {
    return Object.entries(res.data)
      .filter(([name, data]) => {
        return data["enable"];
      })
      .map(([name]) => name);
  });
};
