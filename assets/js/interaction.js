// Interaction Script

jQuery(document).ready(function () {
    jQuery("#hamburgerBtn").click(function () {
        jQuery(".header__mobile").toggleClass("mobile-menu-active");
        jQuery("#hamburgerBtn").toggleClass("hamburger-active");
        jQuery("html").toggleClass("stop-scroll");
    });

    // Toggle all news
    jQuery("#toggleAllNews").click(function () {
        jQuery(".news__wrap__all").toggleClass("is-open");
        jQuery(this).toggleClass("is-open");
    });

    // Documenti - select dropdown: imposta href iniziale e aggiorna al cambio
    jQuery(".js-doc-select").each(function () {
        var $select = jQuery(this);
        var $btn = $select.closest(".documenti__content__list__item").find(".js-doc-download");

        function updateBtn() {
            var url = $select.val();
            var filename = url.substring(url.lastIndexOf("/") + 1);
            $btn.attr("href", url);
            $btn.attr("download", filename);
        }

        updateBtn();
        $select.on("change", function () {
            updateBtn();
        });
    });
});