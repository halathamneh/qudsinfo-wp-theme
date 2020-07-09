import http from "./index";

export default () => http.get("/today-info/").then((res) => res.data);
