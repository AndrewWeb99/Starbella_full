// slick-слайдер
$(function() {
    $('.banner-section__slider').slick({
        dots: true,
        arrows: false,
        autoplay: true,
        cssEase: 'linear',
        infinite: true,
        speed: 2000,
        fade: true,
    });
});
// передача данных на сборку страницы товара
let product_main = document.querySelectorAll('.product');
product_main.forEach(elem => {
    elem.addEventListener('click', () => {
        localStorage.setItem('myKey', elem.dataset.id);

    });
});