// swiper js 1

const swiper = new Swiper('.swiper', {
        direction: 'horizontal',
        loop: true,
        spaceBetween: 25,
        slidesPerView: 3,

        autoplay: true,
        speed: 400,

        // pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        //scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    })
;
