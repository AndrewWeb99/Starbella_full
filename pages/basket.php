<?php
session_start();
if (isset($_SESSION["auth"]) && $_SESSION["auth"] !== true) {
    header('Location: pages/login.php');
}
require_once '../vendor/set.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина</title>
    <link rel="stylesheet" href="../css/preloader.css">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/slick.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="../css/style-gallery.css">
    <link rel="stylesheet" href="../css/media.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../css/style-about.css">
</head>

<body>
    <style>
        table {
            border-spacing: 0 10px;
            font-family: 'Open Sans', sans-serif;
            font-weight: bold;
        }

        th {
            padding: 10px 20px;
            background: #56433D;
            color: #F9C941;
            border-right: 2px solid;
            font-size: 0.9em;
        }

        th:first-child {
            text-align: left;
        }

        th:last-child {
            border-right: none;
        }

        td {
            vertical-align: middle;
            padding: 10px;
            font-size: 14px;
            text-align: center;
            border-top: 2px solid #56433D;
            border-bottom: 2px solid #56433D;
            border-right: 2px solid #56433D;
        }

        td:first-child {
            border-left: 2px solid #56433D;
            /* border-right: none; */
        }

        td:nth-child(2) {
            text-align: left;
        }
    </style>
    <!-- Preloader -->
    <div id="hellopreloader">
        <div id="hellopreloader_preload"></div>
    </div>
    <!-- ЗАГОЛОВОК -->
    <?php require('../blocks/header.php'); ?>
    <!-- основная часть -->
    <h2 class="gallery__header">Корзина</h2>
    <div class="container">
        <h2 style="margin-bottom: 20px;">Список товаров</h2>
        <table style="width:100%; overflow-x: auto;">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Название товара</th>
                    <th>Изображение</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                    <th>Удалить</th>

                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../vendor/set.php';
                $sql = "SELECT product_id ,COUNT(product_id) FROM basket WHERE `user_id` = " . $_SESSION["user"]["id"] . " GROUP BY product_id";
                $cep  = $mysqli->query($sql);
                if (mysqli_num_rows($cep) > 0) {
                    $numb = 0;
                    $cep = mysqli_fetch_all($cep);
                    foreach ($cep as $num) {
                        $numb++;
                        $product = $num[0];
                        $sql2 = "SELECT * FROM `product` WHERE `id` = " . $product;
                        $cep2  = $mysqli->query($sql2);
                        $cep2 = mysqli_fetch_assoc($cep2);
                        $cep2['price'] = (int)$cep2['price'];
                        $num[1] = (int)$num[1];
                        $cost = $cep2['price'] * $num[1]; 
                        echo '
                                        <tr>
                                            <td>' . $numb . '</td>
                                            <td>' . $cep2['name'] . '</td>
                                            <td><img src="' . $cep2['img']  . '" alt="" style="width: 100px; height:auto;"></td>                          
                                            <td>' . $num[1]  . '</td>
                                            <td>' . $cep2['price'] . '</td>
                                            <td class="total_cost">' . $cost . '</td>
                                            <td><a class="button_table" href="/vendor/delete_basket.php?num=' . $num[0] . '">Удалить</a></td>
                                        </tr>                              
                                            ';
                    }
                } else {
                    echo 'Данные отсутсвуют!!!';
                };
                ?>
                <tr>
                    <td style="padding: 10px 20px; background: #56433D; color: #F9C941; border-right: 2px solid; font-size: 0.9em;">Стоимость заказа</td>
                    <td class="totaler"></td>
                </tr>
            </tbody>
        </table>
       
        <!-- Сделать текущие заказы -->
        <a style="width:30%; float: right;" type="submit" class="about__form-button" href="/vendor/add_order.php?num=">Отправить заказ</a><br><br>

    </div>



    <br><br><br><br> <br><br><br><br>
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
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="../js/header.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/js/table.js"></script>
    <script>
        let total = document.querySelectorAll('.total_cost');
        let button = document.querySelector('.about__form-button');
        let totaler = document.querySelector('.totaler');
        let cost = 0;
        total.forEach(element => {
            cost += Number(element.innerHTML);
        });
        button.href += cost;
        totaler.innerHTML = cost;

    </script>
</body>

</html>