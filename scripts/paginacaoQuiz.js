const swiper = new Swiper('.swiper', {
  slidesPerView: 1,
  spaceBetween: 200,
  speed: 0,
  allowTouchMove: false,
});

const nextButtons = document.querySelectorAll('.next-btn');
nextButtons.forEach(nextBtn => nextBtn.addEventListener('click', () => swiper.slideNext()));