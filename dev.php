<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лис</title>
    <link rel="stylesheet" href="./styles/dev.css">
    <link type="logo/x-icon" rel="shortcut icon" href="./img/logo.png">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>

<body>
<?php
include './php/header.php';
?>
    <div class="container">
        <div class="cont-bread">
            <div class="bread">
                <ul class="breadcrumb">
                    <li><a href="index.php">Главная страница</a></li>
                    <li><b>Производство</b></li>
                </ul>
            </div>
            <div class="head-str1">
                <h1 class="head-title">Производство</h1>
            </div>
        </div>
        <div class="container-dev">
            <img class="farm-icon" src="./img/farm.png">
            <div class="farm-text-container">
                <h1 class="farm-title">Добыча древесины</h1>
                <img class="farm-line" src="./img/farm-line.png">
                <p class="farm-text">На строительные рынки деревянные изделия поступают из многих уголков России. Преимущественно, это Вологодская, Архангельская и Кировская области.
                    <br><br>
                    Благодаря высокой плотности древесины деревянные изделия из северных областей, а именно Архангельская, Карельская и Вологодская области, ценятся выше. Чем плотнее древесина, тем проще её обработать. А при правильной обработке плотной северной древесины поверхность готовых изделий будет глянцевой и гладкой.
                    
                    </p>
            </div>
        </div>
        <div class="container-dev-tools">
            <div class="farm-text-container">
                <div class="tools-container">
                    <h1 class="tools-title">Оборудование</h1>
                    <img class="tools-line" src="./img/farm-line.png">
                </div>
                <p class="tools-text">Станки для деревообработки являются неотъемлемой частью производственного процесса в деревообрабатывающей промышленности. Они предназначены для обработки различных видов дерева, таких как бруски, доски, фанера и т.д., с целью создания изделий и материалов из древесины.
                    <br><br>
                    Существует множество различных типов станков для деревообработки, включая распиловочные станки, строгальные станки, фрезерные станки, точильные станки и другие. Каждый из них имеет свою специфическую функцию и используется для определенного вида обработки дерева.
                    <br><br>
                    Наш выбор пал на DeWalt DW733 станки, они обеспечивают высокую производительность и качество обработки материала. Они позволяют значительно увеличить скорость и точность выполнения работ по деревообработке, а также снизить затраты на производство.
                    </p>
            </div>
            <img class="tools-icon" src="./img/tools.png">
        </div>
    </div>
    <?php
include './php/footer.php';
?>
</body>
</html>