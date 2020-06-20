const windowWidth = window.outerWidth;

class Menu {
    constructor() {
        this.classes = {
            active: 'active',
            change: 'change',
            expanded: 'expanded',
        };
        this.responsiveMenu = document.querySelector('.responsive-menu');
        this.trigger = document.querySelector('.open-responsive-menu,.responsive-menu-overlay');
        this.controller();
    }

    controller() {
        this.trigger.addEventListener('click', this.toggleResponsiveMenu);
        this.responsiveMenu.querySelectorAll('li.has-sub')
            .forEach(item => item.addEventListener('click', this.toggleResponsiveSubMenu));
        this.responsiveMenu.querySelectorAll('li.has-sub li a')
            .forEach(item => item.addEventListener('click', e => e.stopPropagation()))
    }

    toggleResponsiveMenu() {
        if(this.responsiveMenu.classList.contains(this.classes.active)) {
            this.responsiveMenu.classList.add(this.classes.active);
            this.trigger.querySelector('.wrapper').classList.add(this.classes.change);
        } else {
            this.responsiveMenu.classList.remove(this.classes.active);
            this.trigger.querySelector('.wrapper').classList.remove(this.classes.change);
        }
    }

    toggleResponsiveSubMenu(e) {
        e.preventDefault();
        e.target.classList.toggle(this.classes.expanded);
    }
}

new Menu();