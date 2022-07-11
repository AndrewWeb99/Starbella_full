<?php
require_once '../vendor/set.php';
session_start();
if (isset($_GET['num'])) {
    $num = $_GET['num'];
    $sql1 = "SELECT * FROM `blog` WHERE id = $num";
    $bl  = $mysqli->query($sql1);
    $bl = mysqli_fetch_assoc($bl);
}
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
    <link rel="stylesheet" href="../css/style-about.css">
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

                        <li class="blog__state" style="display: block;">
                            <img src="<?= $bl['img'] ?>" alt="">
                            <div class="blog__state-info" style="margin-left: 0;">
                                <p class="blog__state-link">
                                    <a class="blog__state-link-first" href="#"><?= $bl['date'] ?></a>
                                </p>
                                <h2 class="blog__state-header"> <a href="#"><?= $bl['name'] ?></a></h2>
                                <p class="blog__state-mintext"><?= $bl['f_desc'] ?></p>
                            </div>
                        </li>
                    </ul>
                    <div class="about__contacts-header">Отзывы</div>
                    <?php
                    $sql1 = "SELECT * FROM `comment_blog` WHERE blog_state_id = " . $bl['id'];
                    $cat  = $mysqli->query($sql1);
                    if ($cat > 0) {
                        $cat = mysqli_fetch_all($cat);
                        foreach ($cat as $num) {
                            echo '<div class="tabs__reviews-flex" style="box-shadow: 0px -2px 16px 0px rgba(0, 0, 0, 0.2); padding:10px; border-radius:10px; margin-bottom: 20px;">
                            <div class="tabs_reviews-text">
                                <div class="tabs_reviews-text-author">
                                    <span>Автор: <b>' . $num[2] . '</b></span> - <span>' . $num[6] . '</span><br>
                                    <span> Тема: <b>' . $num[4] . '</b></span>
                                </div>
                                <p class="tabs_reviews-text-main">' . $num[5] . '</p>
                            </div>
                        </div>';
                        };
                    } else {
                        echo 'Отзывы отсутствуют';
                    };
                    ?>
                    <!-- <div class="tabs__reviews-flex" style="box-shadow: 0px -2px 16px 0px rgba(0, 0, 0, 0.2); padding:10px; border-radius:10px; margin-bottom: 10px;">
                        <div class="tabs_reviews-text">
                            <div class="tabs_reviews-text-author">
                                <span><b>admin</b></span> - <span>Dec 1, 2021</span>
                            </div>
                            <p class="tabs_reviews-text-main">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet soluta, consectetur quidem voluptatem dolorum aperiam consequatur ratione qui, ab minus libero, laboriosam cumque dolor voluptatum autem dignissimos rerum
                                voluptates incidunt? Deserunt culpa maiores magni delectus molestias eaque fugiat numquam vel totam ea exercitationem dolorem nihil, voluptatum vitae consequuntur. Blanditiis dolores similique error rem ea sit cumque
                                nemo veniam officia veritatis. Officia accusantium amet autem ex aliquid debitis voluptatem quia! Nobis, in impedit sit eius eveniet sint vitae fuga incidunt quas possimus recusandae, nesciunt unde architecto, nemo
                                totam! Architecto, commodi cum! Saepe necessitatibus perspiciatis expedita blanditiis totam modi facilis iusto iure assumenda excepturi sequi, ratione optio. Repudiandae magnam vitae consequatur deleniti tempore
                                et corrupti excepturi deserunt dicta. Enim nihil corrupti ratione? Repudiandae perferendis ad fugiat quis eaque cupiditate nesciunt saepe reprehenderit dicta optio. Dignissimos, inventore voluptas, quos expedita
                                voluptatibus, autem voluptatem temporibus eius minima tenetur dolores odit dolore. Dolore, nisi a?</p>
                        </div>
                    </div> -->

                    <div class="about__contacts">
                        <div class="about__contacts-header">Оставить отзыв</div>
                        <div class="about__wrapper">
                            <div class="about__form">
                                <form action="/vendor/add_otziv_blog.php" class="about__form-action" method="POST">
                                    <input style="display: none;" name="id" type="text" value="<?= $bl['id'] ?>">
                                    <label for="">Имя</label><br>
                                    <input name="name" type="text" style="width: 100%;" require><br>
                                    <label for="">Email</label><br>
                                    <input name="email" type="email" style="width: 100%;" require><br>
                                    <label for="">Тема сообщения</label><br>
                                    <input name="theme" type="text" style="width: 100%;" require><br>
                                    <label for="">Ваше сообщение</label><br>
                                    <textarea name="message" style="width: 884px; height: 242px;" id="" cols="60" rows="10" require></textarea>
                                    <button type="submit" class="about__form-button">Отправить</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
    <script src="../product_info.js"></script>
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