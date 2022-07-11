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
    <link rel="stylesheet" href="../css/style-blog.css">
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
                <h2>Блог</h2>
            </div>
            <div class="categorys__header-outer">
                <a href="#">Home</a> / Blog
            </div>
            <!-- sidebar -->
            <div class="wrapper">
                <div class="sidebar__categories">
                    <form action="/pages/blog.php" method="POST" class="footer-form-main">
                        <?php
                        if ($_POST['search']) {
                            $search = $_POST['search'];
                            $sql1 = "SELECT * FROM `blog` WHERE `name` LIKE '%$search%'";
                            echo '<input class="footer-form__input" type="text" placeholder="Search: " name="search" value="'.$search.'">';
                        } else {
                            $sql1 = "SELECT * FROM `blog`";
                            echo '<input class="footer-form__input" type="text" placeholder="Search: " name="search">';
                        }
                        ?>
                        <button class="footer-form__btn-main" type="submit">Найти</button>
                    </form>
                    <div class="sidebar__header header__one">
                        Последние посты
                    </div>
                    <ul class="sidebar__links links__one">
                        <?php
                        $sql2 = "SELECT * FROM blog ORDER BY id DESC LIMIT 5";
                        $rec  = $mysqli->query($sql2);
                        if ($rec > 0) {
                            $rec = mysqli_fetch_all($rec);
                            foreach ($rec as $num) {
                                echo '<li> <a href="/pages/blog_one.php?num=' . $num[0] . '">' . $num[1] . '</a></li>';
                            };
                        } else {
                            echo 'Посты отсутсвуют';
                        };
                        ?>
                    </ul>
                    <div class="sidebar__header header__two">
                        Последние комменты
                    </div>
                    <ul class="sidebar__links links__two">
                        <?php
                        $sql3 = "SELECT * FROM blog table1 JOIN comment_blog table2 ON table1.comment_id=table2.blog_state_id ORDER BY table2.id DESC LIMIT 5";
                        $com  = $mysqli->query($sql3);
                        if ($com > 0) {
                            $com = mysqli_fetch_all($com);
                            foreach ($com as $num) {
                                echo '<li>' . $num[9] . ' <span style="color: black;">on</span> <a href="/pages/blog_one.php?num=' . $num[0] . '">' . $num[1] . '</a></li>';
                            };
                        } else {
                            echo 'Посты отсутсвуют';
                        };
                        ?>
                    </ul>
                </div>
                <!-- основная часть -->
                <div class="content__blog">
                    <ul class="blog__wrapper">
                        <?php
                        $cat  = $mysqli->query($sql1);
                        if ($cat > 0) {
                            $cat = mysqli_fetch_all($cat);
                            foreach ($cat as $num) {
                                echo '<li class="blog__state">
                                <img src="' . $num[2] . '" alt="">
                                <div class="blog__state-info">
                                    <p class="blog__state-link">
                                        <a class="blog__state-link-first" href="#">' . $num[5] . '</a>
                                    </p>
                                    <h2 class="blog__state-header"> <a href="#">' . $num[1] . '</a></h2>
                                    <p class="blog__state-mintext">' . $num[4] . '</p>
                                    <a href="/pages/blog_one.php?num=' . $num[0] . '" class="blog__state-readmore">Узнать больше</a>
                                </div>
                            </li>';
                            };
                        } else {
                            echo 'Статьи отсутсвуют';
                        };
                        ?>
                        <!-- <li class="blog__state">
                            <img src="../images/blog1.jpg" alt="">
                            <div class="blog__state-info">
                                <p class="blog__state-link">
                                    <a class="blog__state-link-first" href="#">Feb 23, 2021</a>
                                    <a href="#">Leave a Comment</a>
                                </p>
                                <h2 class="blog__state-header"> <a href="#">Статья 1</a></h2>
                                <p class="blog__state-mintext">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate .</p>
                                <a href="/pages/blog_one.php" class="blog__state-readmore">Узнать больше</a>
                            </div>
                        </li> -->

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