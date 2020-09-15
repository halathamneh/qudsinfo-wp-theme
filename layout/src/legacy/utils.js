import convertToHijri from "../utils/hijri-date";

export const throttle = (func, limit) => {
  let inThrottle;
  return function () {
    const args = arguments;
    const context = this;
    if (!inThrottle) {
      func.apply(context, args);
      inThrottle = true;
      setTimeout(() => (inThrottle = false), limit);
    }
  };
};

export const getShortHijri = (date) => {
  const hijriDate = convertToHijri(date, -1, scripts_data.langCode);
  return `${hijriDate.dayOfMonth} ${hijriDate.monthText}`;
};
