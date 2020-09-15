import api from "./index";

const URL = "/events/";

export const getTodayEvents = () =>
  api.get(URL).then((res) => res.data.today || []);

export const getCustomDayEvents = (day, month) =>
  api
    .get(URL, {
      params: {
        day,
        month,
      },
    })
    .then((res) => (res.data && res.data.today ? res.data.today : []));
