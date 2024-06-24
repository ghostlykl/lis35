<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лис</title>
    <link rel="stylesheet" href="./styles/auth.css">
    <link type="logo/x-icon" rel="shortcut icon" href="./img/logo.png">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<body>
<?php
include './php/header.php';
include "./php/config.php";
?>
    <div class="container">
        <div class="cont-bread">
            <div class="bread">
                <ul class="breadcrumb">
                    <li><a href="index.php">Главная страница</a></li>
                    <li class="li2"><b>Авторизация</b></li>
                </ul>
            </div>
        </div>
        <div class="offer-up-cont">
            <div class="container-offer">
                <p class="offer-title">Авторизация</p>
                <div class="input-container">
                    <form class="form-reg" method="post">
                        <input type="email" id="email" name="email" class="offer-input" placeholder="Ваш E-mail" required>
                        <input type="password" id="password" name="password" class="offer-input" placeholder="Ваш пароль" required>
                        <input type="submit" name="login" value="Войти"class="btn-finish">
                    </form>
                    <a class="btn-reg" href="./register.php">Зарегистрироваться</a>
                </div>
            </div>
        </div>
    </div>
    <?php
include './php/footer.php';
?>
</body>
</html>