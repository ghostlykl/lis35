<?php
include "config.php";
$name = $_POST['name'];
$phone = $_POST['phone'];

// Prepare and bind parameters to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO `call-offer`(`name`, `phone`) VALUES (?,?)");
$stmt->bind_param("ss", $name, $phone);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "<script>alert('Успешно отправлено')</script>";
} else {
    echo "<script>alert('Ошибка')</script>";
}

$stmt->close();
$conn->close();

?>