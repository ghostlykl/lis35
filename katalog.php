<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лис</title>
    <link rel="stylesheet" href="./styles/katalog.css">
    <link type="logo/x-icon" rel="shortcut icon" href="./img/logo.png">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<body>
<?php
include './php/header.php';
?>
<div class="container-kat">
    <div class="cont-bread">
        <div class="bread">
            <ul class="breadcrumb">
                <li><a href="index.php">Главная страница</a></li>
                <li><b>Каталог</b></li>
            </ul>
        </div>
        <div class="head-str">
            <h1>Каталог</h1>
        </div>
    </div>
    <div class="katalog-container">
        <div class="list-prod">
            <p class="list-title">Список продукции</p>
            <img class="line-list" src="./img/line-list.png">
            <div class="products-container">
                <a class="list-product" href="#">Балясины</a>
                <a class="list-product" href="#">Брус клееный</a>
                <a class="list-product" href="#">Брусок сращеный</a>
                <a class="list-product" href="#">Двери, массив</a>
                <a class="list-product" href="#">Заглушки</a>
                <a class="list-product" href="#">Колонны точёные</a>
                <a class="list-product" href="#">Крышки для столба</a>
                <a class="list-product" href="#">Поручень</a>
                <a class="list-product" href="#">Столбы</a>
                <a class="list-product" href="#">Ступень</a>
                <a class="list-product" href="#">Тетива</a>
                <a class="list-product" href="#">Мебельный щит</a>
                <a class="list-product" href="#">Декоративные резные элементы</a>
                <a class="list-product" href="#">Ножки для стола</a>
                <a class="list-product" href="#">Топливные брикеты RUF</a>
            </div>
        </div>
        <div class="product-list-card-container">
            <p class="list-card-title">Балясины</p>
            <div class="card-container">
                <section class="content">
                    <?php 
                    include './php/catalog.php';
                    ?>
                </section>
            </div>
        </div>
    </div>
</div>
<?php include './php/footer.php';?>
</body>
</html>