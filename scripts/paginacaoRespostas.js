const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: false,
  effect: 'slide',
  allowTouchMove: false,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.next',
    prevEl: '.prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});

const prev = document.querySelector('.prev')
const next = document.querySelector('.next')
const numPag = document.getElementById('numPag')

prev.addEventListener('click', () => {
  numPag.value -= 1;
});

next.addEventListener('click', () => {
  numPag.value += 1;
});