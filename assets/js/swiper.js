// Swiper Script

window.addEventListener('load', function () {
    // Progetti
    if (document.querySelector('.swiperProgetti')) {
        new Swiper('.swiperProgetti', {
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
    }

    // Collaborazioni
    if (document.querySelector('.swiperCollaborazioni')) {
        new Swiper('.swiperCollaborazioni', {
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
    }

    // Valori
    if (document.querySelector('.swiperValori')) {
        new Swiper('.swiperValori', {
            slidesPerView: 1.5,
            spaceBetween: 32,

            breakpoints: {
                768: {
                    slidesPerView: 2.5,
                },
                1024: {
                    slidesPerView: 3.5,
                },
                1280: {
                    slidesPerView: 4.5,
                },
            },

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    }

    // Storia (coverflow gallery)
    if (document.querySelector('.swiperStoria')) {
        new Swiper('.swiperStoria', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            loop: true,
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 700,
                modifier: 1,
                slideShadows: false,
            },
            navigation: {
                nextEl: '.swiperStoria .swiper-button-next',
                prevEl: '.swiperStoria .swiper-button-prev',
            },
            pagination: {
                el: '.swiperStoria .swiper-pagination',
                clickable: true,
            },
        });
    }
});