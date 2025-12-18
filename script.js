// Swiper of Client Testimonial
new Swiper(".testimonial-swiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        768: {
            slidesPerView: 2,
        }
    }
});

// Registration Form Tab Switcher
function showTab(tabName) {
    const tabTrigger = document.querySelector(`#${tabName}-tab`);
    const tab = new bootstrap.Tab(tabTrigger);
    tab.show();
}