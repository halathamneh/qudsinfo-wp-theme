import { AJAX_URL } from "./consts";

function aqsaDistance() {
  var $aqsaDistance = $(".aqsa-distance");
  if ($aqsaDistance.length === 0) return;

  var $sectionContent = $aqsaDistance.find(".section-content");
  if ($aqsaDistance.length)
    $("#aqsa-distance-button").on("click", function () {
      $aqsaDistance.find(".section-content").addClass("loading");
      getLocation();
    });

  //var x = document.getElementById("demo");
  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showDistance, showError);
    } else {
      console.log("Geolocation is not supported by this browser.");
      $sectionContent.addClass("done");
    }
  }

  function showDistance(position) {
    var _data = {
      action: "ajax_distance",
      lat: position.coords.latitude,
      lon: position.coords.longitude,
    };
    $.post({
      url: AJAX_URL,
      data: _data,
      success: function (data) {
        if (data !== -1) {
          var distance = Math.round(parseInt(data) * 100) / 100;

          if (distance > 0) {
            $sectionContent.addClass("done");
            $sectionContent.html(
              "<span class='result'>" +
                distance +
                scripts_data.lang["km"] +
                "</span>"
            );
          }
        }
      },
    });
  }
}

function distance_fallback(msg) {
  var distance_section = $(".aqsa-distance");
  distance_section.find("span").text(msg);
  distance_section.find("span").show();
  distance_section.find(".section-content").hide();
  distance_section.slideDown();
}

function showError(error) {
  var msg;
  switch (error.code) {
    case error.PERMISSION_DENIED:
      msg = scripts_data.lang["aqsa_distance.permission"];
      distance_fallback(msg);
      break;
    case error.POSITION_UNAVAILABLE:
      msg = scripts_data.lang["aqsa_distance.enable_gps"];
      distance_fallback(msg);
      break;
    case error.TIMEOUT:
      msg = scripts_data.lang["aqsa_distance.error"];
      distance_fallback(msg);
      break;
    case error.UNKNOWN_ERROR:
    default:
      msg = scripts_data.lang["aqsa_distance.error"];
      distance_fallback(msg);
      break;
  }
}

aqsaDistance();
