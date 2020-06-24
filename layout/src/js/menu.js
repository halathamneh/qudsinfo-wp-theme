import { throttle } from "./utils";

const windowWidth = window.outerWidth;

class Menu {
  constructor() {
    this.classes = {
      active: "active",
      change: "change",
      expanded: "expanded",
    };
    this.responsiveMenu = document.querySelector(".responsive-menu");
    this.trigger = document.querySelector(
      ".open-responsive-menu,.responsive-menu-overlay"
    );
    this.controller();
    this.stickyMenu();
  }

  controller() {
    this.trigger.addEventListener("click", () => this.toggleResponsiveMenu());
    this.responsiveMenu
      .querySelectorAll("li.has-sub")
      .forEach((item) =>
        item.addEventListener("click", () => this.toggleResponsiveSubMenu())
      );
    this.responsiveMenu
      .querySelectorAll("li.has-sub li a")
      .forEach((item) =>
        item.addEventListener("click", (e) => e.stopPropagation())
      );
  }

  toggleResponsiveMenu() {
    if (!this.responsiveMenu.classList.contains(this.classes.active)) {
      this.responsiveMenu.classList.add(this.classes.active);
      this.trigger.querySelector(".wrapper").classList.add(this.classes.change);
    } else {
      this.responsiveMenu.classList.remove(this.classes.active);
      this.trigger
        .querySelector(".wrapper")
        .classList.remove(this.classes.change);
    }
  }

  toggleResponsiveSubMenu(e) {
    e.preventDefault();
    e.target.classList.toggle(this.classes.expanded);
  }

  stickyMenu() {
    const header = document.querySelector("header#header");
    const wrap = document.querySelector(
      "header.sticky .top-header, .open-responsive-menu"
    );
    const otd = document.querySelector("#onthisday");
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
