<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лис</title>
    <link rel="stylesheet" href="./styles/lk.css">
    <link type="logo/x-icon" rel="shortcut icon" href="./img/logo.png">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<body>
<?php
include './php/header.php';
    include "./php/config.php";

    if(!isset($_SESSION['email'])){
        header("Location:auth.php");
        exit();
    }else{
        ?>
    <div class="container">
        <div class="cont-bread">
            <div class="bread">
                <ul class="breadcrumb">
                    <li><a href="index.php">Главная страница</a></li>
                    <li class="li"><b>Личный кабинет</b></li>
                </ul>
            </div>
            <div class="head-str">
                <h1>Личный кабинет</h1>
            </div>
        </div>
        <div class="lk-container">
            <div class="lk-content-info">
                <div class="lk-avatar">
                    <img class="av-ico" src="./img/lk-av.png">
                </div>
                <?php
            include "./php/config.php";
            
            if(isset($_SESSION['email'])){
                ?>
                <p class="lk-name"><?php echo $_SESSION['username'];?></p>
                <form method="POST"><input class="logout" type="submit" name="logout" value="Выйти"></form>
            <?php
            }
        ?>
                <img class="line-lk" src="./img/line-lk.png">
                <span class="adress">Адрес доставки</span>
                <input type="text" class="town" placeholder="Город">
                <input type="text" class="town" placeholder="Улица">
                <div class="kv-cont">
                    <input type="text" class="house" placeholder="Дом">
                    <input type="text" class="house" placeholder="Квартира / офис">
                </div>
                <button class="kv-btn">Изменить</button>
            </div>
            <div class="lk-order-container">
                <span class="order-container-title">История заказов</span>
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
                <div class="lk-order-card">
                <?php
                        echo '<img class="order-img" src="data:image/jpeg;base64,' . $row['image'] . '" alt="'. '">';?>
                    <div class="text-container-order">
                        <p class="name-order"><?php echo $row['title']?></p>
                        <p class="widt-order">Размеры:</p>
                        <div class="widt-cont">
                            <p class="widt"><?php echo $row['razmeroffer']?></p>
                        </div>
                    </div>
                    <p class="stat-order">Статус заказа:<br>
                            <b>Доставляется</b></p>
                    <p class="value-order"><?php echo $row['kolvo'] . " "?>шт.</p>
                    <p class="price-order"><?php echo $row['price']?>р</p>
                </div>
           <?php }
            $matchFound = true;
            break;}
        } 
        }?>
            </div>
        </div>
    </div>
    <?php
include './php/footer.php';
?>
</body>
</html>
<?php     
    }
?>