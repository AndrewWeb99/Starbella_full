<!-- ЗАГОЛОВОК -->
<?php


if ($_SESSION["user"]["id"] == "") {
    $busk = 0;
} else {
    $sql = "SELECT * FROM `basket` WHERE `user_id` = " . $_SESSION["user"]["id"];
    $basket  = $mysqli->query($sql);
    $busk = $basket->num_rows;
}
?>
<header class="header">
    <!-- верхний header -->
    <div class="header__top">
        <div class="container">
            <div class="header__top-inner">
                <!-- левая часть в.header`a -->
                <nav class="menu">
                    <ul class="menu__list">
                        <li class="menu__item">
                            <a class="menu__link" href="#">Скидки 27%</a>
                        </li>
                    </ul>
                </nav>
                <!-- центр (логотип) -->
                <a href="#" class="logo">
                    <img class="logo__img" src="/images/logo (1).png" alt="">
                </a>
                <!-- правая часть -->
                <div class="header__box">
                    <ul class="user-list">
                        <li class="user-list__item">
                            <a class="user-list__link" href="#"><img class="img-svg" src="/images/search.svg" alt=""></a>
                        </li>
                        <li class="user-list__item">
                            <a class="user-list__link" href="/pages/login.php"><img class="img-svg" src="/images/user.svg" alt=""></a>
                        </li>
                        <li class="user-list__item">
                            <a class="user-list__link basket" href="/pages/basket.php"><img class="img-svg" src="/images/basket.svg" alt="">
                                <p class="basket__num"><?= $busk ?></p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- нижний header -->
    <div class="burger__innener">
        <p class="menu__header-burger">
            Меню
        </p>
        <div class="burger">
            <span></span>
        </div>
    </div>
    <div class="header__botoom">
        <div class="container">
            <ul class="menu__main">
                <li class="menu__main-item">
                    <a href="/index.php" class="menu__main-item-link">Главная</a>
                </li>
                <li class="menu__main-item">
                    <a href="/pages/catalog.php" class="menu__main-item-link">Магазин</a>
                </li>
                <li class="menu__main-item">
                    <a href="/pages/blog.php" class="menu__main-item-link">Блог</a>
                </li>
                <li class="menu__main-item">
                    <a href="/pages/gallery.php" class="menu__main-item-link">Медиа</a>
                </li>

                <li class="menu__main-item">
                    <a href="/pages/about.php" class="menu__main-item-link">О нас</a>
                </li>
            </ul>

        </div>
    </div>
</header>