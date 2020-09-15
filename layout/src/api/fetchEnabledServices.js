import http from "./index";
import {currentLang} from '../lang/utils' 

export default () => {
  return http.get("/services").then((res) => {
    return Object.entries(res.data)
      .filter(([name, data]) => {
        return data[currentLang];
      })
      .map(([name]) => name);
  });
};
