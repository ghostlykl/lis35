<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лис</title>
    <link rel="stylesheet" href="./styles/404.css">
    <link type="logo/x-icon" rel="shortcut icon" href="./img/logo.png">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<body>
<?php
include './php/header.php';
?>
    <div class="container">
        <div class="error-container">
            <h1 class="error">404</h1>
            <p class="error-text">Сраница не найдена</p>
            <p class="error-description">Возможно, был введен некорректный адрес или страница была удалена</p>
            <button class="go-to-main"><a href="katalog.php">Перейти к каталогу</a></button>
        </div>
    </div>
    <?php
include './php/footer.php';
?>
</body>
</html>