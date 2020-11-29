import "./vendorsInit";
import * as fn from "./functions";
import "./menu";
import "./newsbar";
// import "./search";
// import './aqsa-distance';

if (window.location.pathname.includes("/library")) {
  import("./infos-list");
}

fn.smoothScrollAnchors();
fn.setColorOnFrontPageService();
fn.sticky_index();
