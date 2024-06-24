<!DOCTYPE php>
<php lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles/header.css">
        <link rel="preconnect" href="https://rsms.me/">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    </head>


    <div class="header_main">
            <div class="head">
                <img class="header-logo" src="./img/logo.png">
                <div class="nav">
                    <nav>
                        <a class="header-btn" href="index.php">Главная</a>
                        <a class="header-btn" href="katalog.php">Каталог</a>
                        <a class="header-btn" href="dev.php">Производство</a>
                        <a class="header-btn" href="./index.php#stairs-cont">Изготовление лестниц</a>
                        <a class="header-btn" href="./index.php#provider">Поставщикам</a>
                        <a href="./add_to_cart1.php"><img class="list" src="./img/list.png"></a>
                        <a href="./register.php"><img class="lk-ico" src="./img/lk.png"></a>
                        <?php
                        include "./php/config.php";

                        if (isset($_SESSION['email'])) {
                        ?>
                            <p class="user"><?php echo $_SESSION['username']; ?></p>
                        <?php
                        }
                        ?>
                        <div class="contacts-container">
                            <div class="phone-img">
                                <img class="phone-ico" src="./img/phone-ico.png">
                            </div>
                            <div class="text-cont">
                                <p class="contacts-text">+ 7 (921) 062-999-3 <br> zakaz@lis35.ru</p>
                            </div>
                        </div>
                    </nav>
                </div>            
                <div class="burger">
                <span></span>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('.burger').addEventListener('click', function() {
            this.classList.toggle('active');
            document.querySelector('.nav').classList.toggle('open');
        })
    </script>

</html>