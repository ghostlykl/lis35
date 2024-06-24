<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лис</title>
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="icon" type="image/x-icon" href="./img/logo.svg">
</head>
<body>
<?php
    include "./php/config.php";
   
   
    if(!isset($_SESSION['admin'])){?>
    <?php    
    if(isset($_POST['send3'])){
     if(!empty($_POST['login2']) && !empty($_POST['password'])){
       $login2 = $_POST['login2'];
       $password = $_POST['password'];
       $sql = "SELECT * FROM `admin` WHERE `login` = '$login2' AND `password` = '$password'";
       $result = $conn->query($sql);
       if($result->num_rows == 1){
         $_SESSION['admin'] = $login2;
         header('location:admin');
       }else echo "<script>alert('Юзер отсутствует')</script>";
     }}
     ?>
<div class="osn-container">
  <main class="container">
    <form method="POST" class="form-auth">
      <a href="index"><img class="logo" src="img\logo.png" alt=""></a>
      <h1 class="title">Доступ к панели администратора</h1>

      <div class="form-floating">
        <input type="text" name="login2" class="form-control" id="floatingInput" placeholder="Логин">
        <input type="password" name="password"  class="form-control" placeholder="Пароль">
        <input class="btn-primary" type="submit" name="send3" value="Войти">
      </div>
      <p class="mt-2 text-center text-muted">&copy; Лис35</p>

    </form>
  </main>
</div>
    
<?php
    }else{
?>
<!-- Меню -->
<div class="menu">
  <header class="menu-head">
    <a href="index" class="logo-left">
      <img class="logo-left-logo" src="img\logo.png" alt="" width="50" height="50">
    </a>
    <form method="POST"><input class="btn-log" type="submit" name="adminout" value="Выйти"></form>
  </header>
</div>



<div class="admin-content">
  <form method="POST" enctype="multipart/form-data" class='form-cont'>
    <p class="">Добавить товар</p>
    <input type="text" name="title" class="form-control w-75 mt-2" placeholder="Название товара" required>
    <input type="text" name="material" class="form-control w-75 mt-2" placeholder="Материал" required>
    <input type="text" name="water" class="form-control w-75 mt-2" placeholder="Влажность">
    <input type="text" name="razmer" class="form-control w-75 mt-2" placeholder="Размер 1" required>
    <input type="text" name="razmer2" class="form-control w-75 mt-2" placeholder="Размер 2" required>
    <input type="text" name="razmer3" class="form-control w-75 mt-2" placeholder="Размер 3" required>
    <input type="text" name="price" class="form-control w-75 mt-2" placeholder="Цена" required>
    <div class="input-group mt-3 w-auto">
      <input type="file" name="image" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
      <button class="btn btn-primary" type="submit" name="add" id="inputGroupFileAddon04">Добавить товар</button>
    </div>
  </form>                   

                <?php
                if (isset($_POST['add'])) {
                    // Получение данных из POST-запроса
                    $title = $_POST['title'];
                    $material = $_POST['material'];
                    $water = $_POST['water'];
                    $razmer = $_POST['razmer'];
                    $razmer2 = $_POST['razmer2'];
                    $razmer3 = $_POST['razmer3'];
                    $price = $_POST['price'];
                    if (!empty($_FILES['image']['tmp_name'])) {

                        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

                        $sql = "INSERT INTO `catalog`( `title`, `image`, `material`, `water`, `razmer`, `razmer2`, `razmer3`, `price`) VALUES ('$title','$image','$material','$water','$razmer','$razmer2','$razmer3',' $price')";
                        $result = $conn->query($sql);
                        if ($result) {
                            echo "Товар добавлен";
                        } else {
                            echo "Ошибка;";
                        }
                    }
                }
                ?>
  <div class="card-cont">
    
    <?php
      $card = $conn->query("SELECT * FROM `catalog` ORDER BY `Id`");
      while ($row = mysqli_fetch_assoc($card)) {
    ?>
    
    <div class="card">                            
      <?php
      echo '<img class="bl-ico" src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="'. '">';?>
      <div class="card-body">
        <h5 class="card-title">Название: <?php echo ' ';
          echo htmlspecialchars($row['title']) . ' '; ?></h5>
        <p class="card-text">Цена: <?php echo ' ';
          echo htmlspecialchars($row['price']); ?></p>
        <form method="POST" class="w-100 d-flex align-items-center justify-content-center">
          <input type="hidden" name="catalog_id" value="<?php echo htmlspecialchars($row['id']); ?>">
          <button class="btn-dell" type="submit" name="dell2">Удалить</button>
        </form>
      </div>
    </div>
 


                <?php
            }
                ?>
  </div>
<?php
    }  
?>
</div>
<?php if(isset($_POST['adminout'])){
            session_destroy();
            // unset($_SESSION['login']);
            header("location:admin");
}?>
</body>
</html> 