<?php
require_once '../vendor/set.php';
session_start();
if (isset($_GET['num'])) {
    $num = $_GET['num'];
    $sql1 = "SELECT * FROM `product` WHERE id = $num";
    $pr  = $mysqli->query($sql1);
    $pr = mysqli_fetch_assoc($pr);

    $sql2 = "SELECT `name` FROM `category` WHERE id = " . $pr['category_id'];
    $cat  = $mysqli->query($sql2);
    $cat = mysqli_fetch_assoc($cat);
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
    <link rel="stylesheet" href="../css/style-product.css">
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

    <section class="product-card">
        <div class="container">
            <div class="wrapper">
                <div class="product__image-box"><img id="product__image-box" src="<?= $pr['img']  ?>" alt=""></div>
                <div class="product-info">
                    <h1 class="product__title" id="product__title"><?= $pr['name']  ?></h1>
                    <?php
                    $sql5 = "SELECT stars FROM `otziv` WHERE product_id = " . $pr['otzv_id'];
                    $star  = $mysqli->query($sql5);
                    $total_star = 0;
                    $total_oc = 0;
                    if ($star > 0) {
                        $star = mysqli_fetch_all($star);
                        foreach ($star as $num) {
                            $total_star++;
                            $total_oc = $total_oc + $num[0];
                        };
                    };
                    if ($total_oc != 0) {
                        $total = $total_oc / $total_star;
                    }
                    ?>
                    <div class="rating-mini" id="main_r" data-total="<?= $total ?>">
                    </div>
                    <div class="costs">
                        <div id="old" class="cost old"><?= $pr['price']  ?></div>
                        <div id="cost" class="cost"><?= $pr['price']  ?></div>
                    </div>
                    <div id="descript" class="product__descript"><?= $pr['short_decsription']  ?></div>
                    <p class="total"><span id="total"><?= $pr['total']  ?></span> в наличии</p>
                    <div class="product__action">
                        <div class="product__action-total">
                            
                            <input id="inputtotal" type="number" value="1" min="0" max="<?= $pr['total']  ?>">
                            
                        </div>
                        <a id="basket_main" href="/vendor/add_basket.php?num=<?= $pr['id'] ?>&total=" class="product__tobasket-btn">В корзину</a>
                    </div>
                    <div class="product__action-two">
                        <a class="product__action-two-like" href="/vendor/add_likes.php?num=<?= $pr['id'] ?>"><i class="fas fa-heart"></i>Добавить в
                            избранное</a>
                        <a class="product__action-two-compare" href="#"><i class="fas fa-chart-area"></i>Сравнить</a>
                    </div>
                    <div class="product__info-dop">
                        <p><span><b>Номер товара: </b></span><?= $pr['number_tov']  ?><span id="number"></span></p>
                        <p><span><b>Категория: </b></span><?= $cat['name']  ?></p>
                        <p><span><b>Тэги: </b></span>
                            <?php
                            $sql3 = "SELECT * FROM `tags` WHERE number_tag = " . $pr['tags'];
                            $tag  = $mysqli->query($sql3);
                            if ($tag > 0) {
                                $tag = mysqli_fetch_all($tag);
                                foreach ($tag as $num) {
                                    echo '<a href="#">' . $num[2] . '</a>  ';
                                };
                            } else {
                                echo 'Тэги отсутсвуют';
                            };
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- tabs -->
            <div class="tabs">
                <div class="tabs__nav">
                    <a class="tabs__link tabs__link_active" href="#content-1">Описание</a>
                    <a class="tabs__link" href="#content-2">Дополнительная информация</a>
                    <a class="tabs__link" href="#content-3">Отзывы(<span id="otzv_cost"></span>)</a>
                </div>
                <div class="tabs__content">
                    <div class="tabs__pane tabs__pane_show" id="content-1">
                        <h2 id="tabs__pane__header" class="tabs__pane-header">Описание изделия</h2>
                        <p id="full__description"><?= $pr['full_description']  ?></p>
                    </div>
                    <div class="tabs__pane" id="content-2">
                        <table>
                            <tbody>
                                <?php
                                $sql4 = "SELECT * FROM `characters` WHERE character_id = " . $pr['charct_id'];
                                $ch  = $mysqli->query($sql4);
                                if ($ch > 0) {
                                    $ch = mysqli_fetch_all($ch);
                                    foreach ($ch as $num) {
                                        echo ' <tr>
                                        <th>' . $num[2] . '</td>
                                        <td id="additional__one">' . $num[3] . '</td>
                                    </tr>';
                                    };
                                } else {
                                    echo 'Характеристики отсутсвуют';
                                };
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tabs__pane" id="content-3">
                        <div class="tabs__reviews">
                            <!-- отзывы -->
                            <?php
                            $sql4 = "SELECT * FROM `otziv` WHERE product_id = " . $pr['otzv_id'];
                            $ch  = $mysqli->query($sql4);
                            if ($ch > 0) {
                                $ch = mysqli_fetch_all($ch);
                                foreach ($ch as $num) {
                                    echo ' <div class="tabs__reviews-flex" style="box-shadow: 0px -2px 16px 0px rgba(0, 0, 0, 0.2); padding:10px; border-radius:10px; margin-bottom: 20px;">
                                    <div class="tabs_reviews-avatar"><img src="/images/avatar-unknown.png" alt=""></div>
                                    <div class="tabs_reviews-text" style="border: none;">
                                        <div class="tabs_reviews-text-author">
                                            <span><b>' . $num[2] . '</b></span> - <span>' . $num[6] . '</span>
                                        </div>
                                        <div class="rating-mini rating-reviews" data-id="' . $num[5] . '">
                                            
                                        </div>
                                        <p class="tabs_reviews-text-main">' . $num[4] . '</p>
                                    </div>
                                </div>';
                                };
                            } else {
                                echo 'Отзывы отсутсвуют';
                            };
                            ?>
                            
                            <!-- оставить отзыв -->
                            <div class="tabs__reviews-new">
                                <h2 class="tabs__reviews-new-header">Добавить отзыв</h2>
                                <p class="tabs__reviews-new-outer">Ваш электронный адрес не будет опубликован. Обязательные поля помечены *</p>
                                <form action="/vendor/add_otziv_product.php" method="post">
                                    <input class="inputs-reviews" type="text" name="id" style="display: none;" value="<?= $pr['id']  ?>">
                                    <label class="label-rewiews" for="">Имя*</label><br>
                                    <input class="inputs-reviews" type="text" name="name" required><br>
                                    <label class="label-rewiews" for="">E-mail*</label><br>
                                    <input class="inputs-reviews" type="email" name="email" required><br>
                                    <label class="label-rewiews" for="">Ваш рейтинг*</label><br>
                                    <div class="rating-area">
                                        <input type="radio" id="star-5" name="rating5" value="5">
                                        <label for="star-5" title="Оценка «5»"></label>
                                        <input type="radio" id="star-4" name="rating4" value="4">
                                        <label for="star-4" title="Оценка «4»"></label>
                                        <input type="radio" id="star-3" name="rating3" value="3">
                                        <label for="star-3" title="Оценка «3»"></label>
                                        <input type="radio" id="star-2" name="rating2" value="2">
                                        <label for="star-2" title="Оценка «2»"></label>
                                        <input type="radio" id="star-1" name="rating1" value="1">
                                        <label for="star-1" title="Оценка «1»"></label>
                                    </div><br><br>
                                    <label class="label-rewiews" for="">Ваш отзыв*</label><br>
                                    <textarea class="inputs-reviews" name="message" id="" cols="30" rows="10" required></textarea><br>
                                    <button type="submit" class="product__tobasket-btn rewiews-btn">Отправить</button>
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
    <script src="../js/preloader.js"></script>
    <script src="https://kit.fontawesome.com/ad00a0aa0d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/slick.min.js"></script>
    <script src="../js/product.js"></script>
    <script src="../js/header.js"></script>
    <script src="/js/stars.js"></script>
    <script>
        let cost = document.getElementById('otzv_cost');
        let total = document.querySelectorAll('.tabs__reviews-flex');
        let span = 0;
        total.forEach(element => {
            span++;
        });
        cost.innerHTML = span;
    </script>
    <script>
        let link = document.getElementById('basket_main');
        let input = document.getElementById('inputtotal');
        input.addEventListener('change', () => {
            console.log(input.value);
            link.href = '/vendor/add_basket.php?num=<?= $pr['id'] ?>&total=' + input.value;
        })
    </script>
</body>

</html>