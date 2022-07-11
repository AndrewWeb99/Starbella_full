let burg = document.querySelector('.burger');
let menu = document.querySelector('.menu__main');

burg.addEventListener('click', () => {
    burg.classList.toggle('active');
    menu.classList.toggle('active');
    document.body.classList.toggle('lock');
})