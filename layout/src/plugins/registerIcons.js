import Vue from "vue";
import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import {
  faEye,
  faHeadphones,
  faVideo,
} from "@fortawesome/free-solid-svg-icons";

library.add(faEye, faHeadphones, faVideo);
Vue.component("fa", FontAwesomeIcon);
