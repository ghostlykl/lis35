<?php
// Подключение к базе данных
include "./php/config.php";
if ($conn->connect_error) {
    die('Connection failed: '. $conn->connect_error);
}

// Запрос к базе данных
$sql = 'SELECT * FROM catalog';
$result = $conn->query($sql);

// Вывод данных 
$groupCount = 0;
while ($row = $result->fetch_assoc()) {
    if ($groupCount % 3 == 0) {
        echo "<div class='card-container'>";
    }
    echo "<div class='cardd'>";
    
    // Сохранение изображения на сервере
    $imagePath = 'img/'. $row['title']. '.jpg';
    file_put_contents($imagePath, $row['image']);
    // Вывод изображения
    echo "<img class='img-cont' src='". $imagePath. "' alt='". $row['title']. "'>";
    echo "<div class='card-holder'>";
    echo '<p class="card-name">'. $row['title']. '</p>';
    echo "<a href='card.php?catalog_id=" .$row ['id']."' class='btn-card'>Подробнее</a>";
    echo "</div>";
    echo "</div>";

    $groupCount++;
    if ($groupCount % 3 == 0) {
        echo "</div>";
    }
}
?>
