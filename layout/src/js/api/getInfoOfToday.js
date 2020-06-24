import api from "./index";

export default () => api.get("/today-info/").then((res) => res.data);
