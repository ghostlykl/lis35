<?php 
    include "./php/config.php";

    if(!isset($_SESSION['email'])){
        header("Location:auth.php");
        exit();
    }else{
        ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лис</title>
    <link rel="stylesheet" href="./styles/card.css">
    <link type="logo/x-icon" rel="shortcut icon" href="./img/logo.png">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<body>
<?php
include './php/header.php';
?>
    <div class="container2">
        <div class="cont-bread">
            <div class="bread">
                <ul class="breadcrumb">
                    <li><a href="index.php">Главная страница</a></li>
                    <li><a href="katalog.php">Каталог</a></li>
                    <li class="li2"><b><?php 
                        // Подключение к базе данных
                        include "./php/config.php";
                        
                        // Проверка соединения
                        if ($conn->connect_error) {
                            die("Connection failed: ". $conn->connect_error);
                        }
                        
                        // ID продукта, который мы хотим найти
                        $catalog_id = $_GET['catalog_id'];
                        
                        // SQL запрос для получения данных продукта по ID
                        $sql = "SELECT id, title FROM catalog WHERE id = $catalog_id";
                        
                        // Выполнение запроса
                        $result = $conn->query($sql);
                        
                        // Проверка, были ли найдены данные
                        if ($result->num_rows > 0) {
                            // Вывод данных каждого продукта
                            while($row = $result->fetch_assoc()) {    
                    
                    echo $row["title"];}} 
                    $conn->close();?></b></li>
                </ul>
            </div>
        </div>
        <?php
        include "./php/config.php";
         // Проверка соединения
        if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
        }
    
        // ID продукта, который мы хотим найти
        $catalog_id = $_GET['catalog_id'];
    
        // SQL запрос для получения данных продукта по ID
        $sql = "SELECT id, title, image, material, water, razmer, razmer2, razmer3, price FROM catalog WHERE id = $catalog_id";
    
        // Выполнение запроса
        $result = $conn->query($sql);

    // Проверка, были ли найдены данные
        if ($result->num_rows > 0) {
        // Вывод данных каждого продукта
        while($row = $result->fetch_assoc()) {          
        // Сохранение изображения на сервере
        $imagePath = 'img/'. $row['title']. '.jpg';
        file_put_contents($imagePath, $row['image']);
        ?>
        <div class='card-container'>
            <img class='card-tovar' src="<?php echo $imagePath ?> " alt="">
            <div class='card-tv'>
                <div class='card-title'>
                    <?php echo $row["title"];?>
                </div>
                <div class='card-text'>
                    <p class="">Материал: <?php echo $row["material"]; ?></p>
                </div>
                <div class='card-text'>
                    <p class="">Влажность:<?php echo " " . $row["water"];?></p>
                </div>
                <div class='card-text'>
                <p class="">Размеры:</p>
                </div>
                <form method='post' class="form-cont"action='add_to_cart1.php'>
                    <div class='tov-size-container'>
                        <div class='tov-size-block'>
                            <input type="radio" name="razmeroffer" id="razmeroffer" value="<?php echo $row["razmer"];?>"><?php echo $row["razmer"];?>
                        </div>
                        <div class='tov-size-block'>
                        <input type="radio" name="razmeroffer" id="razmeroffer" value="<?php echo $row["razmer2"];?>"><?php echo $row["razmer2"];?>
                        </div>
                        <div class='tov-size-block'>
                        <input type="radio" name="razmeroffer" id="razmeroffer" value="<?php echo $row["razmer3"];?>"><?php echo $row["razmer3"];?>
                        </div>
                    </div>
                    <div class='btn-tov-container'>
                        <input type='hidden' name='catalog_id' value="<?php echo htmlspecialchars ($row['id']);?>">
                        <input type='hidden' name='user_id' value="<?php echo htmlspecialchars ($_SESSION['user_id']);?>">
                        <input type='hidden' name='title' value="<?php echo htmlspecialchars ($row['title']);?>">
                        <input type='hidden' name='price' value="<?php echo htmlspecialchars ($row['price']);?>">
                        <input type='hidden' name='image' value="<?php echo base64_encode ($row['image']);?>">
                        <input type='number' class="inp-number" name='kolvo' min='1' value='1'> 
                        <input type='submit' class='btn-buy' name='add_to_cart1' value='Добавить в корзину'>
                    </div>
                </form>
                <div class='price'>
                    <p class="">Цена:<?php echo " " . $row["price"];?>р/шт</p>
                </div>
            </div>
        </div>
        <?php
        }
        } else {
        echo "No results found.";
        }
    
    // Закрытие соединения
        $conn->close();
?>
    
<?php
include './php/footer.php';
?>
</body>
</html>
<?php     
    }
?>