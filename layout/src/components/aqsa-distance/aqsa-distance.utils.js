import { AJAX_URL } from "../../legacy/consts";

export function getUserLocation() {
  return new Promise((resolve, reject) => {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(resolve, (err) =>
        locationFail(err, reject)
      );
    } else {
      locationFail(
        {
          code: 99,
          message: "Geolocation is not supported by this browser",
        },
        reject
      );
    }
  });
}

function locationFail(error, callback) {
  console.warn(error.message);
  switch (error.code) {
    case error.PERMISSION_DENIED:
      callback(
        "please try again and allow location permission to find your distance from aqsa"
      );
      break;
    case error.POSITION_UNAVAILABLE:
      callback("please make sure you have enabled location on your device");
      break;
    case 99:
      callback("your browser is not supported");
      break;
    case error.TIMEOUT:
    default:
      callback("something went wrong please try again");
      break;
  }
}
