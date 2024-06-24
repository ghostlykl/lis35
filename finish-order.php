<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лис</title>
    <link rel="stylesheet" href="./styles/finish-order.css">
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
                    <li class="li2"><b>Оформление заказа</b></li>
                </ul>
            </div>
        </div>
        <div class="offer-up-cont">
            <div class="container-offer">
                <p class="offer-title">Оформление заказа</p>
                <?php
    require_once './php/config.php';

    $sql = "SELECT * FROM `cart`";
    $result = $conn->query($sql);

    foreach ($result as $row) {
    $matchFound = false;
    if ($_SESSION['user_id'] == $row['user_id']) {
        $sql = "SELECT * FROM `catalog`";
        $result = $conn->query($sql);
        foreach ($result as $rows) {
            if ($row['catalog_id'] = $rows['id'] && $_SESSION['user_id'] == $row['user_id']) {
            ?> 
                <div class="offer-card">
                    <?php
                        echo '<img class="bl-ico" src="data:image/jpeg;base64,' . $row['image'] . '" alt="'. '">';?>
                    <div class="card-text-container">
                        <p class="card-title"><?php echo $row['title']?></p>
                        <p class="card-text">Размеры:</p>
                        <div class="card-size">
                            <p class="size"><?php echo $row['razmeroffer']?></p>
                        </div>
                    </div>
                    <p class="num-card"><?php echo $row['kolvo']?>шт.</p>
                    <p class="price-card"><?php echo $row['price']?>р</p>
                </div>
                <?php    }
        $matchFound = true;
        break;}
    } 
    }?> <form method="POST" action="./php/accept-offer.php">
                <div class="input-container">
                    <input type="text" class="offer-input" name="name" id="name" placeholder="Ваше имя" required>
                    <input type="email" class="offer-input" name="email" id="email" placeholder="Ваш E-mail" required>
                    <input type="tel" class="offer-input" name="phone" id="phone" placeholder="+7 (911) 444 44-44" required>
                </div>
                <p class="input-text">Доставка</p>
                <div class="input-container-town">
                    <input type="text" class="offer-input" name="city" id="city" placeholder="Город" required>
                </div>
                <div class="check-delivery">
                    <input type="radio" name="delivery" id="delivery" class="delivery" value="Самовывоз">
                    <p class="delivery-text">Доставка</p>
                </div>
                <div class="check-delivery">
                    <input type="radio" name="delivery" id="delivery" class="delivery" value="Самовывоз">
                    <p class="delivery-text">Самовывоз</p>
                </div>
                <div class="input-container-delivery">
                    <input type="text" class="offer-input" name="fio" id="fio" placeholder="ФИО получателя" required>
                    <input type="text" class="offer-input" name="street" id="street" placeholder="Улица" required>
                </div>
                <div class="input-container-adress">
                    <input type="text" class="offer-input-adress1" name="house" id="house" placeholder="Дом">
                    <input type="text" class="offer-input-adress" name="appartaments" id="appartaments" placeholder="Квартира / офис" > 
                </div>
                <div class="input-container">
                    <input type="text" class="offer-input-ps" name="comment" id="comment" placeholder="Комментарий к заказу">
                </div>
                <div class="check-delivery">
                    <input type="checkbox" name="konfid" id="konfid" class="delivery" value="Согласен" required>
                    <p class="acess-text">Я согласен с политикой конфиденциальности</p>
                </div>
                <div class="finish-price-offer-container">
                    <p class="finish-price-offer-text">Товары, <?php echo $totalKolvo?>шт.</p>
                    <p class="finish-price-offer-text"><?php echo $row['price'] . ' '?>₽ </p>
                </div>
                <div class="finish-price-del-container">
                </div>
                <div class="finish-price-itog-container">
                    <p class="finish-price-itog-text">Итого:</p>
                    <p class="finish-price-itog-text"><?php echo $totalCost . " "?>₽ </p>
                </div>
                <div class="finish-btn-container">
                    <input type="submit" class="btn-finish" name='accept' value='Оформить заказ'>
                </div>
            </div>
        </form>
        </div>
        <?php
        include './php/footer.php';
        ?>
    </div>
</body>
</html>