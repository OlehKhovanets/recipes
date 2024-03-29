/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/web/custompages.js ***!
  \*****************************************/
var links = document.querySelectorAll('.link');
var texts = document.querySelectorAll('.text');

// Додаємо обробники подій для кожної лінки
links.forEach(function (link, index) {
  link.addEventListener('click', function () {
    // Приховуємо всі тексти та знімаємо підсвічування з усіх лінок
    texts.forEach(function (text) {
      text.style.display = 'none';
    });
    links.forEach(function (link) {
      link.classList.remove('active');
    });

    // Показуємо вибраний текст та додаємо клас "active" для вибраної лінки
    texts[index].style.display = 'block';
    link.classList.add('active');
  });
});
/******/ })()
;