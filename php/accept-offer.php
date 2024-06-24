<?php
include 'config.php';


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$delivery = $_POST['delivery'];
$fio = $_POST['fio'];
$street = $_POST['street'];
$appartaments = $_POST['appartaments'];
$comment = $_POST['comment'];
$konfid = $_POST['konfid']; 
$house = $_POST['house']; 


$stmt = $conn->prepare("INSERT INTO `offer`(`name`, `email`, `phone`, `city`, `delivery`, `fio`, `street`, `house`, `appartaments`, `comment`, `konfid`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssssss", $name, $email, $phone, $city, $delivery, $fio, $street, $house, $appartaments, $comment, $konfid);


if ($stmt->execute()) {
    echo "Успешно";
} else {
    echo "Ошибка". $stmt->error;
}

$stmt->close();
$conn->close();
?>



