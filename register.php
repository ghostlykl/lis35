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
?>
    <div class="container">
        <div class="cont-bread">
            <div class="bread">
                <ul class="breadcrumb">
                    <li><a href="index.php">Главная страница</a></li>
                    <li class="li2"><b>Регистрация</b></li>
                </ul>
            </div>
        </div>
        <div class="offer-up-cont">
            <div class="container-offer">
                <p class="offer-title">Регистрация</p>
                <div class="input-container">
                    <form class="form-reg" action="./php/register-funk.php" method="post">
                        <input type="text" id="username" name="username" class="offer-input" placeholder="Ваше имя" required>
                        <input type="email" id="email" name="email" class="offer-input" placeholder="Ваш адрес электронной почты" required>
                        <input type="password" id="password" name="password" class="offer-input" placeholder="Пароль" required>
                        <input type="password" id="confirm_password" name="confirm_password" class="offer-input" placeholder="Повторите пароль" required>
                        <input type="submit" value="Зарегистрироваться" class="btn-finish">
                    </form> 
                    <div><a href="./auth.php" class="auth-btn">Войти</a></div>
                </div>
            </div>
        </div>
    </div>
    <?php
include './php/footer.php';
?>
</body>
</html>