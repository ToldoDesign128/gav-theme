// Interaction Script

jQuery(document).ready(function () {
    jQuery("#hamburgerBtn").click(function () {
        jQuery(".header__mobile").toggleClass("mobile-menu-active");
        jQuery("#hamburgerBtn").toggleClass("hamburger-active");
        jQuery("html").toggleClass("stop-scroll");
    });
});