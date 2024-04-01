const swiper = new Swiper(".swiper", {
  loop: true,
  autoHeight: true,
  autoplay: {
    delay: 4000,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  slidesPerView: 1,
  spaceBetween: 10,

  breakpoints: {
    800: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
  },
});
