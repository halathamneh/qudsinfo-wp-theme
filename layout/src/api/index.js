import axios from "axios";
import { API_TOKEN, BASE_URL } from "../js/consts";
import { currentLang } from "../lang/utils";

let baseUrl = BASE_URL;
console.log(currentLang);
if (currentLang !== "ar") {
  baseUrl = baseUrl.replace("https://", "https://en.");
}

const http = axios.create({
  baseURL: baseUrl,
  headers: {
    Authorization: `Bearer ${API_TOKEN}`,
    "Accept-Language": currentLang,
  },
});

export default http;
