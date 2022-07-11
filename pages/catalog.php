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
    <link rel="stylesheet" href="../css/style-catalog.css">
    <link rel="stylesheet" href="../css/media.css">
</head>

<body>
    <!-- Preloader -->
    <div id="hellopreloader">
        <div id="hellopreloader_preload"></div>
    </div>
    <!-- ЗАГОЛОВОК -->
    <?php require('../blocks/header.php'); ?>
    <!-- категории продуктов -->
    <section class="categorys">
        <div class="container">
            <div class="categorys__header-inner">
                <h2>Product Category</h2>
            </div>
            <div class="categorys__header-outer">
                <a href="#">Home</a> / Product Category
            </div>
            <!-- sidebar -->
            <div class="wrapper">
                <div class="sidebar__categories">
                    <!-- <form class="footer-form-main">
                        <input class="footer-form__input" type="text" placeholder="Search: ">
                        <button class="footer-form__btn-main" type="submit">Найти</button>
                    </form> -->
                    <div class="sidebar__header header__one">
                        Последние товары
                    </div>
                    <ul class="sidebar__links links__one">
                        <?php
                        $sql2 = "SELECT * FROM product ORDER BY id DESC LIMIT 5";
                        $rec  = $mysqli->query($sql2);
                        if ($rec > 0) {
                            $rec = mysqli_fetch_all($rec);
                            foreach ($rec as $num) {
                                echo '<li> <a href="/pages/product.php?num=' . $num[0] . '">' . $num[1] . '</a></li>';
                            };
                        } else {
                            echo 'Посты отсутсвуют';
                        };
                        ?>

                    </ul>
                    <div class="sidebar__header header__two">
                        Recent Comments
                    </div>
                    <ul class="sidebar__links links__two">
                        <?php
                        $sql3 = "SELECT * FROM otziv table1 JOIN product table2 ON table1.product_id=table2.otzv_id ORDER BY table1.id DESC LIMIT 5";
                        $com  = $mysqli->query($sql3);
                        if ($com > 0) {
                            $com = mysqli_fetch_all($com);
                            foreach ($com as $num) {
                                echo '<li>' . $num[2] . ' <span style="color: black;">on</span> <a href="/pages/product.php?num=' . $num[7] . '">' . $num[8] . '</a></li>';
                            };
                        } else {
                            echo 'Посты отсутсвуют';
                        };
                        ?>
                    </ul>
                </div>
                <!-- основная часть -->
                <div class="content__categories">
                    <ul class="products">
                        <?php
                        $sql1 = "SELECT * FROM `category`";
                        $cat  = $mysqli->query($sql1);
                        if ($cat > 0) {
                            $cat = mysqli_fetch_all($cat);
                            foreach ($cat as $num) {
                                echo ' <li class="product-wrapper">
                                <a href="/pages/product-list.php?num=' . $num[0] . '" class="product">
                                    <div class="product-photo">
                                        <img src="' . $num[2] . '" alt="">
                                    </div>
                                    <p>' . $num[1] . '(<span>1</span>) </p>
                                </a>
                            </li>';
                            };
                        } else {
                            echo 'Категории отсутсвуют';
                        };
                        ?>
                    </ul>
                </div>
            </div>


        </div>
    </section>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/slick.min.js"></script>

    <script src="../js/header.js"></script>
    <script>
        let header_one = document.querySelector('.header__one');
        let header_two = document.querySelector('.header__two');
        let recentlinksone = document.querySelector('.links__one');
        let recentlinkstwo = document.querySelector('.links__two');
        header_one.addEventListener('click', () => {
            recentlinksone.classList.toggle('active');
        });

        header_two.addEventListener('click', () => {
            recentlinkstwo.classList.toggle('active');
        })
    </script>
</body>

</html>