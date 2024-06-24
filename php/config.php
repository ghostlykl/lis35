<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
  die("Connection failed: ". $conn->connect_error);
};
?>
<?php

if(isset($_POST['login'])){
$email = $_POST['email'];
$password = $_POST['password'];
$stmt = $conn->prepare("SELECT * FROM users WHERE email =?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['loggedin'] = true; 
        $_SESSION['username'] = $user['username']; 
        header("Location: lk.php"); 
    } else {
        echo "Неверный пароль.";
    }
} else {
    echo "Пользователь не найден.";
}
}
if(isset($_POST['logout'])){
  session_destroy();
  header('Location: auth.php');
  exit;
}

if(isset($_POST['add_to_cart1'])) {
  $user_id = $_POST['user_id'];
  $id = $_POST['catalog_id'];
  $image = $_POST['image'];
  $kolvo = $_POST['kolvo'];
  $razmeroffer = $_POST['razmeroffer'];
  $find = "SELECT * FROM `catalog` WHERE `id` = '$id'";
  $catalog = $conn -> query($find);
  foreach($catalog as $row) {
      $title = $row['title'];
      $razmer = $row['razmer'];
      $price = $row['price'];
      $sql = "INSERT INTO `cart`(`user_id`, `title`, `razmeroffer`, `kolvo`, `price`, `catalog_id`, `image`) VALUES ('$user_id','$title','$razmeroffer', '$kolvo', '$price','$id', '$image')";
      $conn -> query($sql);
      header("location: add_to_cart1.php");
      exit();
  }
}

if (isset($_POST['dell'])) {
  $id = $_POST['review_id'];
  $stmt = $conn->prepare("DELETE FROM `cart` WHERE `id` =?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
  if ($stmt->affected_rows > 0) {
      header('refresh:0');
  }

}

if (isset($_POST['dell2'])) {
    $id = $_POST['catalog_id'];
    $stmt = $conn->prepare("DELETE FROM `catalog` WHERE `id` =?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        header('refresh:0');
    }
  
  }

$sqlCart = "SELECT `user_id`, `price`, `razmeroffer`, `kolvo`, `catalog_id` FROM `cart`";
$resultCart = $conn->query($sqlCart);

if (!$resultCart) {
    die("Query failed: ". $conn->error);
}

$totalCost = 0;
$totalKolvo = 0;
if(isset($_SESSION['user_id'])){
foreach ($resultCart as $rowCart) {
    if ($_SESSION['user_id'] == $rowCart['user_id']) {
        $sqlCatalog = "SELECT * FROM `catalog`";
        $resultCatalog = $conn->query($sqlCatalog);

        if (!$resultCatalog) {
            die("Query failed: ". $conn->error);
        }

        foreach ($resultCatalog as $rowCatalog) {
            if ($rowCart['catalog_id'] == $rowCatalog['id'] && $_SESSION['user_id'] == $rowCart['user_id']) {
                // Calculate total cost for the matched item
                $totalCost += $rowCatalog['price'] * $rowCart['kolvo'];
                $totalKolvo += $rowCart['kolvo'];
            }
        }
    }
}}
?>







