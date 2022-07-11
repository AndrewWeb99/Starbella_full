<?php
require_once('vendor/set.php');
?>
<?
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/preloader.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="css/media.css">
</head>

<body>
    <!-- Preloader -->
    <div id="hellopreloader">
        <div id="hellopreloader_preload"></div>
    </div>
    <!-- ЗАГОЛОВОК -->
    <?php require('./blocks/header.php'); ?>
    <!-- СЛАЙДЕР -->
    <section class="banner-section">
        <div class="banner-section__inner">
            <div class="banner-section__slider">
                <a class="banner-section__slider-item" href="#">
                    <img class="img__slider" src="images/2.jpg" alt="">
                </a>
                <a class="banner-section__slider-item" href="#">
                    <img class="img__slider" src="images/1.jpg" alt="">
                </a>
            </div>
        </div>
    </section>
    <!-- Карты предложений -->
    <section class="cards-main">
        <div class="container">
            <div class="cards-inner">
                <a class="cards-inner__item" href="#">
                    <div class="cards-inner__item-text">
                        DIAMOND <br> RINGS
                    </div>
                    <div class="cards-inner__item-img">
                        <img src="images/banner-01.jpg" alt="">
                    </div>
                </a>
                <a class="cards-inner__item" href="#">
                    <div class="cards-inner__item-text">
                        STARBELLA <br> HAIR PIN
                    </div>
                    <div class="cards-inner__item-img">
                        <img src="images/banner-02.jpg" alt="">
                    </div>
                </a>
                <a class="cards-inner__item" href="#">
                    <div class="cards-inner__item-text">
                        WOMAN'S <br> EARRINGS
                    </div>
                    <div class="cards-inner__item-img">
                        <img src="images/banner-03.jpg" alt="">
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- рекламная секция -->
    <section class="girl">
        <div class="container">
            <div class="girl-inner">
                <div class="girl-inner__text" id="girl_inner__text">
                    STARBELLA <br> LOOKBOOK 2021
                    <div class="play-button"><img src="images/play.png" alt=""></div>
                    <a class="play-link" href="#">Узнать больше</a>
                </div>
                <div class="girl-inner__img">
                    <img src="images/girl.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- секция новых товаров -->
    <section class="products2">
        <div class="container">
            <h2 class="products-header">Новое поступление</h2>
            <ul class="products" id="products">
                <?php
                $sql1 = "SELECT * FROM product table1 JOIN category table2 ON table1.category_id=table2.id ORDER BY table1.id DESC LIMIT 10";
                $pr = $mysqli->query($sql1); 
                if ($pr > 0) {
                    $pr = mysqli_fetch_all($pr);
                    foreach ($pr as $num) {
                        $sql9 = "SELECT * FROM `otziv` WHERE product_id = " . $num[12];
                        $star  = $mysqli->query($sql9);
                        $total_star = 0;
                        $total_oc = 0;
                        if ($star > 0) {
                            $star = mysqli_fetch_all($star);
                            foreach ($star as $number) {
                                $total_star++;
                                $total_oc = $total_oc + $number[5];
                            };
                            if ($total_oc != 0) {
                                $total = $total_oc / $total_star;
                            }
                        };
                        echo '<li id="0" class="product-wrapper" value="0">
                        <a data-id="0" href="/pages/product.php?num=' . $num[0] . '" class="product">
                            <div class="product-photo">
                                <img src="' . $num[6] . '" alt="">
                            </div>
                            <div class="rating-mini" data-total="' . $total . '">
                               
                            </div>
                            <p>' . $num[1] . '</p>
                            <div class="cost">' . $num[2] . '</div>
                        </a>
                        <a class="product_buttons-like" href="/vendor/add_likes.php?num=' . $num[0] . '"><i class="fas fa-heart"></i></a>
                        <a class="product_buttons-basket" href="/vendor/add_basket.php?num=' . $num[0] . '"><i class="fas fa-shopping-basket"></i></a>
                    </li>';
                    };
                } else {
                    echo 'Тэги отсутсвуют';
                };
                ?>

            </ul>
            <div class="button4-box"><a href="/pages/catalog.php" class="button-4">Больше продукции</a></div>

        </div>
    </section>
    <!-- секция преимущества -->
    <section class="powers">
        <div class="container">
            <div class="powers__inner">
                <a class="power__inner-item" href="#">
                    <div class="icons-one"></div>
                    <p>FAST & FREE SHIPPING<br>On Order Over $90</p>
                </a>
                <a class="power__inner-item two" href="#">
                    <div class="icons-two"></div>
                    <p>SAVE 20% WHEN YOU<br>Call +01 2334 600</p>
                </a>
                <a class="power__inner-item" href="#">
                    <div class="icons-three"></div>
                    <p>ONLINE HELP SUPPORT<br>Sign Up For Gifts</p>
                </a>
                <a class="power__inner-item two" href="#">
                    <div class="icons-four"></div>
                    <p>14-DAY MONEY BACK<br>On Order Over $90</p>
                </a>
            </div>
        </div>
    </section>

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
                                <a href="https://www.instagram.com"><img src="images/instagram.svg" alt=""></a>
                            </li>
                            <li class="social-list__item">
                                <a href="https://vk.com"><img src="images/vkontakte.svg" alt=""></a>
                            </li>
                            <li class="social-list__item">
                                <a href="https://www.facebook.com"><img src="images/facebook.svg" alt=""></a>
                            </li>
                            <li class="social-list__item">
                                <a href="https://www.youtube.com"><img src="images/youtube.svg" alt=""></a>
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

    <script src="js/preloader.js"></script>
    <script src="https://kit.fontawesome.com/ad00a0aa0d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/header.js"></script>
    <script>
        let div = document.querySelectorAll(".rating-mini");
        document.addEventListener("DOMContentLoaded", function() {
            div.forEach((elem) => {
                if (Math.round(elem.dataset.total) == 0) {
                    elem.innerHTML =
                        "<span></span> <span></span> <span></span> <span></span> <span></span>";
                }
                if (Math.round(elem.dataset.total) == 1) {
                    elem.innerHTML =
                        '<span class="active"></span> <span></span> <span></span> <span></span> <span></span>';
                }
                if (Math.round(elem.dataset.total) == 2) {
                    elem.innerHTML =
                        '<span class="active"></span> <span class="active"></span> <span></span> <span></span> <span></span>';
                }
                if (Math.round(elem.dataset.total) == 3) {
                    elem.innerHTML =
                        '<span class="active"></span> <span class="active"></span> <span class="active"></span> <span></span> <span></span>';
                }
                if (Math.round(elem.dataset.total) == 4) {
                    elem.innerHTML =
                        '<span class="active"></span> <span class="active"></span> <span class="active"></span> <span class="active"></span> <span></span>';
                }
                if (Math.round(elem.dataset.total) == 5) {
                    elem.innerHTML =
                        '<span class="active"></span> <span class="active"></span> <span class="active"></span> <span class="active"></span> <span class="active"></span>';
                }
            });
        });
    </script>
</body>

</html>