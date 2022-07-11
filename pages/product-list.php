<?php
require_once '../vendor/set.php';
session_start();
if (isset($_GET['num'])) {
    $num = $_GET['num']; 
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
    <link rel="stylesheet" href="../css/style-product-list.css">
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
                <a href="#">Home</a> / Product Category / Product
            </div>
            <!-- sidebar -->
            <div class="wrapper">
                <div class="sidebar__categories">
                    <form action="/pages/product-list.php?num=<?= $num ?>" method="POST" class="footer-form-main">
                        <?php
                        if ($_POST['search']) {
                            $search = $_POST['search'];
                            $sql1 = "SELECT * FROM `product` WHERE category_id = $num and `name` LIKE '%$search%'";
                            echo '<input class="footer-form__input" type="text" placeholder="Search: " name="search" value="' . $search . '">';
                        } else {
                            $sql1 = "SELECT * FROM `product` WHERE category_id = $num";
                            echo '<input class="footer-form__input" type="text" placeholder="Search: " name="search">';
                        }
                        ?>
                        <button class="footer-form__btn-main" type="submit">Найти</button>
                    </form>
                    <div class="sidebar__header header__one">
                        Категории
                    </div>
                    <ul class="sidebar__links links__one">
                        <?php
                        $sql8 = "SELECT * FROM `category`";
                        $dop_cat  = $mysqli->query($sql8);
                        if ($dop_cat > 0) {
                            $dop_cat = mysqli_fetch_all($dop_cat);
                            foreach ($dop_cat as $nums) {
                                echo '<li><a href="/pages/product-list.php?num=' . $nums[0] . '">' . $nums[1] . '</a></li>';
                            };
                        } else {
                            echo 'Категории отсутсвуют';
                        };
                        ?>

                    </ul>
                    <div class="sidebar__header">
                        Фильтр по цене
                    </div>
                    <label for="">Начальная цена</label>
                    <input id="nach_cost" type="text" style="margin-bottom: 20px;" value="0"><br>
                    <label for="">Конечная цена</label>
                    <input id="kon_cost" type="text" style="margin-bottom: 20px;">

                    <div class="sidebar__header">
                        Тэги изделий
                    </div>
                    <ul class="sidebar__links links__one">
                        <?php
                        $sql10 = "SELECT * FROM tags table1 join product table2 ON table1.number_tag=table2.otzv_id WHERE table2.category_id = $num";
                        $dop_cats  = $mysqli->query($sql10);
                        if ($dop_cats > 0) {
                            $dop_cats = mysqli_fetch_all($dop_cats);
                            foreach ($dop_cats as $nums) {
                                echo '<li><a href="#">' . $nums[2] . '</a></li>';
                            };
                        } else {
                            echo 'Категории отсутсвуют';
                        };
                        ?>

                    </ul>
                </div>
                <!-- основная часть -->
                <div class="content__categories">
                    <div class="view__filter-product">
                        <div class="view-product" style="visibility: hidden;">
                            <div class="view-product-styleone"><i class="fas fa-th"></i></div>
                            <div class="view-product-styletwo"><i class="fas fa-list-ul"></i></div>
                        </div>
                        <select id="sorter">
                            <option selected>Выберите тип сортировки</option>
                            <option value="2">От большей цены к меньшей</option>
                            <option value="3">От меньшей цены к большей</option>
                            <option value="4">По популярности</option>
                        </select>
                    </div>
                    <ul class="products" id="products">
                        <?php
                        // $sql1 = "SELECT * FROM `product` WHERE category_id = $num";
                        $cat  = $mysqli->query($sql1);
                        if ($cat > 0) {
                            $cat = mysqli_fetch_all($cat);
                            foreach ($cat as $num) {
                                $sql9 = "SELECT * FROM `otziv` WHERE product_id = " . $num[12];
                                $star  = $mysqli->query($sql9);
                                $total_star = 0;
                                $total_oc = 0;
                                $total = 0;
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

                                echo '<li id="0" class="product-wrapper" value="0" data-star="' . $total . '" data-cost="' . $num[2] . '">
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
                            echo 'Товары отсутсвуют';
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
    <script src="https://kit.fontawesome.com/ad00a0aa0d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/slick.min.js"></script>
    <script src="../js/header.js"></script>
    <script>
        let header_one = document.querySelector('.header__one');
        let recentlinksone = document.querySelector('.links__one');
        header_one.addEventListener('click', () => {
            recentlinksone.classList.toggle('active');
        });
    </script>
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
    <script src="/js/filter.js"></script>
    <script src="/js/sort.js"></script>

</body>

</html>