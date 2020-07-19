import { throttle } from "./utils";

const windowWidth = window.outerWidth;

class Menu {
  constructor() {
    this.stickyMenu();
  }

  stickyMenu() {
    const header = document.querySelector("header#header");
    const wrap = document.querySelector(
      "header.sticky .top-header, .open-responsive-menu"
    );
    let timer;
    window.addEventListener("scroll", () => {
      if (timer !== null) {
        clearTimeout(timer);
      }
      timer = setTimeout(() => {
        if (window.scrollY > 80) {
          header.classList.remove("page-start");
          wrap.classList.remove("transparent-nav");
        } else if (window.scrollY < 50) {
          header.classList.add("page-start");
          wrap.classList.add("transparent-nav");
        }
      });
    });
  }
}

new Menu();
