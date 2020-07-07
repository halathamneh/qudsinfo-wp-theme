import axios from "axios";
import { API_TOKEN, BASE_URL } from "../consts";

const api = axios.create({
  baseURL: BASE_URL,
  headers: {
    Authorization: `Bearer ${API_TOKEN}`,
    "Accept-Language": scripts_data.langCode,
  },
});

export default api;
