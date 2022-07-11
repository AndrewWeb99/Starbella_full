<?php
require_once '../vendor/set.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/preloader.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/slick.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="../css/style-about.css">
    <link rel="stylesheet" href="../css/media.css">


</head>

<body>
    <!-- Preloader -->
    <div id="hellopreloader">
        <div id="hellopreloader_preload"></div>
    </div>
    <!-- ЗАГОЛОВОК -->
    <?php require('../blocks/header.php'); ?>
    <!-- основная часть -->
    <h2 class="about__header">Свяжитесь с нами
        <?php
        if (isset($_GET['yes'])) {
            echo ' (ВАШ ОТЗЫВ БЫЛ ОТПРАВЛЕН)';
        }
        ?>
    </h2>
    <div class="container">
        <div class="about__map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2295.640812101033!2d69.11874131579998!3d54.874117966880696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43b23a42e97b1ac7%3A0x9f53e927585debac!2z0JPRg9C80LDQvdC40YLQsNGA0L3Qvi3RgtC10YXQvdC40YfQtdGB0LrQuNC5INC60L7Qu9C70LXQtNC2!5e0!3m2!1sru!2skz!4v1618334021203!5m2!1sru!2skz" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="about__contacts">
            <div class="about__contacts-header">Наши контакты</div>
            <div class="about__wrapper">
                <div class="about__form">
                    <form action="/vendor/add_otziv_mag.php" method="post" class="about__form-action">
                        <label for="">Имя</label><br>
                        <input type="text" name="name" require><br>
                        <label for="">Email</label><br>
                        <input type="email" name="email" require><br>
                        <label for="">Тема сообщения</label><br>
                        <input type="text" name="theme" require><br>
                        <label for="">Ваше сообщение</label><br>
                        <textarea name="message" id="" cols="30" rows="10" require></textarea>
                        <button type="submit" class="about__form-button">Отправить</button>
                    </form>
                </div>
                <div class="about__contacts-info">
                    <div class="about__contacts-container">
                        <div class="about__contacts-container-img">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="about__contacts-container-text">
                            <h5 class="about__contacts-info-header">Address:</h5>
                            <p class="about__contacts-info-text">60, 29th Street #343, San Francisco, CA 94110, United States Of America</p>
                        </div>
                    </div>

                    <div class="about__contacts-container">
                        <div class="about__contacts-container-img">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="about__contacts-container-text">
                            <h5 class="about__contacts-info-header">Phone Numbers:</h5>
                            <p class="about__contacts-info-text">+91 1234567898</p>
                        </div>
                    </div>

                    <div class="about__contacts-container">
                        <div class="about__contacts-container-img">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="about__contacts-container-text">
                            <h5 class="about__contacts-info-header">Email:</h5>
                            <p class="about__contacts-info-text">Demo@Example.Com <br> Monday – Friday 10 AM – 8 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer__top">
                <div class="footer__top-inner">
                    <div class="footer__top-item footer__top-newslatter">
                        <h6 class="footer__top-title">Подпишись на нашу рассылку и узнавай о акциях быстрее</h6>
                        <form class="footer-form">
                            <input class="footer-form__input" type="text" placeholder="Введите ваш e-mail: ">
                            <button class="footer-form__btn" type="submit">Отправить</button>
                        </form>
                    </div>

                    <div class="footer__top-item">
                        <h6 class="footer__top-title">Информация</h6>
                        <ul class="footer-list">
                            <li class="footer-list__item">
                                <a href="#">О компании</a>
                            </li>
                            <li class="footer-list__item">
                                <a href="#">Контакты</a>
                            </li>
                            <li class="footer-list__item">
                                <a href="#">Акции</a>
                            </li>
                            <li class="footer-list__item">
                                <a href="#">Магазины</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__top-item">
                        <h6 class="footer__top-title">Интернет магазин</h6>
                        <ul class="footer-list">
                            <li class="footer-list__item">
                                <a href="#">Доставка и самовывоз</a>
                            </li>
                            <li class="footer-list__item">
                                <a href="#">Оплата</a>
                            </li>
                            <li class="footer-list__item">
                                <a href="#">Возврат-обмен</a>
                            </li>
                            <li class="footer-list__item">
                                <a href="#">Новости</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__top-item footer__top-social">
                        <ul class="social-list">
                            <li class="social-list__item">
                                <a href="https://www.instagram.com"><img src="/images/instagram.svg" alt=""></a>
                            </li>
                            <li class="social-list__item">
                                <a href="https://vk.com"><img src="/images/vkontakte.svg" alt=""></a>
                            </li>
                            <li class="social-list__item">
                                <a href="https://www.facebook.com"><img src="/images/facebook.svg" alt=""></a>
                            </li>
                            <li class="social-list__item">
                                <a href="https://www.youtube.com"><img src="/images/youtube.svg" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <a class="footer__bottom-link" href="#">Договор оферты</a>
                <a class="footer__bottom-link" href="#">Политика обработки персональных данных</a>
            </div>
        </div>
    </footer>
    <script src="../js/preloader.js"></script>
    <script src="../product_info.js"></script>
    <script src="https://kit.fontawesome.com/ad00a0aa0d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/slick.min.js"></script>
    <script src="../js/header.js"></script>

</body>

</html>