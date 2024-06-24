<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лис</title>
    <link rel="stylesheet" href="./styles/recycle.css">
    <link type="logo/x-icon" rel="shortcut icon" href="./img/logo.png">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<?php
include './php/config.php';
include './php/header.php';
if(!isset($_SESSION['email'])){
    header("Location:auth.php");
    exit();
}else{
?>
<body>
    <div class="cont-bread">
            <div class="bread">
                <ul class="breadcrumb">
                    <li><a href="index.php">Главная страница</a></li>
                    <li class="li"><b>Корзина</b></li>
                </ul>
            </div>
            <div class="head-str">
                <h1>Корзина</h1>
            </div>
        </div>
    </div>
<div class="erg">
    <div>
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
                    <div class="recycle-card"><?php
                        echo '<img class="bl-ico" src="data:image/jpeg;base64,' . $row['image'] . '" alt="'. '">';?>
                    <div class="card-text-container">
                        <p class="card-title"><?php echo $row['title']?></p>
                        <p class="card-text">Размеры:</p>
                        <div class="card-size">
                            <p class="size"><?php echo $row['razmeroffer']?></p>
                        </div>
                    </div>
                    <p class="price-card"><?php echo $row['price']?>р/шт.</p>
                    <p class="num-card"><?php echo $row['kolvo']?>шт.</p>
                    <form method="post">
                        <input type="hidden" name="review_id" value="<?php echo htmlspecialchars($row['id']);?>">
                        <button class="dell"name="dell"><img class="cross" src="./img/cross.png"></button>
                    </form>
                    </div>
               
        <?php    }
        $matchFound = true;
        break;}
    } 
    }?> </div>
            <div>
                <div class="order-container">
                    <div class="title-container">
                        <p class="order-title">Ваш заказ</p>
                    </div>                
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
                <div class="order-text-container">

                    <p class="name-order1"><?php echo $row['title'] . " "?>(<?php echo $row['kolvo']?>)</p>
                    <p class="order-tovar"><?php echo $row['price']?>р</p>
                </div> 
            <?php    }
        $matchFound = true;
        break;}
    } 
    }?>
                <div class="line-cont">
                    <img class="order-line" src="./img/order-line.png">
                </div>
                <div class="order-text-container">
                    <p class="finish">Итого:</p>
                        <?php
include "./php/config.php";

echo "<p class='finish-price'>". $totalCost. "р</p>";
?>
                </div>
                <div class="btn-cont">
                    <button class="btn-recycle"><a href="finish-order.php">Заказать</a></button>
                </div>
                <div class="order-description-cont">
                    <p class="order-description">Доступные способы оплаты и время доставки можно выбрать при оформлении заказа</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include './php/footer.php';
?>
<?php     
    }
?>