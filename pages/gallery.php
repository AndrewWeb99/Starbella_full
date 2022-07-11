<? session_start();
require_once '../vendor/set.php'; ?>
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
    <link rel="stylesheet" href="../css/style-gallery.css">
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
    <h2 class="gallery__header">Галлерея</h2>
    <div class="container">
        <div class="gallery__box">
            <a data-fancybox="gallery" href="../images/gallery/img1-1024x808.jpg"><img class="gallery__img" src="../images/gallery/img1-1024x808.jpg"></a>
            <a data-fancybox="gallery" href="../images/gallery/img2-1024x808.jpg"><img class="gallery__img" src="../images/gallery/img2-1024x808.jpg"></a>
            <a data-fancybox="gallery" href="../images/gallery/img3-1024x808.jpg"><img class="gallery__img" src="../images/gallery/img3-1024x808.jpg"></a>
            <a data-fancybox="gallery" href="../images/gallery/img4-1024x808.jpg"><img class="gallery__img" src="../images/gallery/img4-1024x808.jpg"></a>
            <a data-fancybox="gallery" href="../images/gallery/img5-1024x808.jpg"><img class="gallery__img" src="../images/gallery/img5-1024x808.jpg"></a>
            <a data-fancybox="gallery" href="../images/gallery/img6-1024x808.jpg"><img class="gallery__img" src="../images/gallery/img6-1024x808.jpg"></a>
            <a data-fancybox="gallery" href="../images/gallery/img7-1024x808.jpg"><img class="gallery__img" src="../images/gallery/img7-1024x808.jpg"></a>
            <a data-fancybox="gallery" href="../images/gallery/img8-1024x808.jpg"><img class="gallery__img" src="../images/gallery/img8-1024x808.jpg"></a>
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
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="../js/header.js"></script>
</body>

</html>