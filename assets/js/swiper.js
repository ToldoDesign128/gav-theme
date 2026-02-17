// Swiper Script

window.addEventListener('load', function () {
    // Progetti
    new Swiper('.swiperProgetti', {
        // Optional parameters
        slidesPerView: 1.5,
        spaceBetween: 32,
        loop: true,

        breakpoints: {
            768: {
                slidesPerView: 2.5,
            },
            1024: {
                slidesPerView: 3.5,
            },
        },

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    // Collaborazioni
    new Swiper('.swiperCollaborazioni', {
        // Optional parameters
        slidesPerView: 2,
        spaceBetween: 32,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },

        breakpoints: {
            768: {
                slidesPerView: 4,
            },
            1024: {
                slidesPerView: 4,
            },
            1280: {
                slidesPerView: 5,
            },
        },

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
});