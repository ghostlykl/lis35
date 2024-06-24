<?php
include 'config.php';

// Получение данных из формы
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Проверка совпадения пароля и повторения пароля
if ($password!== $confirm_password) {
    echo "Пароли не совпадают.";
    exit;
}

// Хеширование пароля
$password = password_hash($password, PASSWORD_DEFAULT);

// Проверка на существование электронной почты
$stmtCheckEmail = $conn->prepare("SELECT COUNT(*) AS count FROM users WHERE email =?");
$stmtCheckEmail->bind_param("s", $email);
$stmtCheckEmail->execute();
$resultCheckEmail = $stmtCheckEmail->get_result();
$row = $resultCheckEmail->fetch_assoc();

if ($row['count'] > 0) {
    echo "Электронная почта уже используется.";
    exit;
}


$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?,?,?)");
$stmt->bind_param("sss", $username, $email, $password);


if ($stmt->execute()) {
    echo "Пользователь успешно зарегистрирован.";
} else {
    echo "Ошибка при регистрации: ". $stmt->error;
}


$stmt->close();
$conn->close();
?>
