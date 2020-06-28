import hijri from "hijri";

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
  const hijriDate = hijri.convert(date, -1);
  return `${hijriDate.dayOfMonth} ${hijriDate.monthText}`;
};
