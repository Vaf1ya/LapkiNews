<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../script/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>ЛапкиNews</title>
</head>

<body>
    <div action='' style="display:none;" id="new_form">
        <?php
        require_once('auth.php');
        ?>
    </div>
    <div action='' style="display:none;" id="ava_form">
        <?php
        require_once('ava.php');
        ?>
    </div>
    <header>
        <div class="header_top flex indent between">
            <div>
                <a href="../index.php" class="logo flex">
                    <img class="logo_img" src="../img/log.jpg" alt="">
                    <label> <span>Лапки</span>News</label>
                </a>
            </div>
            <div class="personal_area flex">
                <a href="tel: 89000000091">+7 900 000-00-91</a>
                <button><a href="../pages/feedback.php">Обратная связь</a></button>
                <?php
                if (!empty($_COOKIE['user'])) {
                    if ($_COOKIE['user'] == 1) {
                        echo '<a href="../pages/admin.php" class="logauth"><img class="tel" src="../img/lk.png" alt=""></a>
                        <a href="../include/logauth.php" class="logauth">Выход</a>';
                    } else {
                        echo '<a href="../pages/cabinet.php" class="logauth"><img class="tel" src="../img/lk.png" alt=""></a>
                        <a href="../include/logauth.php" class="logauth">Выход</a>';
                    }
                } else {
                    echo ' <img id="cabinet" class="tel" src="../img/lk.png" alt="">';
                };
                ?>
            </div>
        </div>
        <hr>
        <nav class="header_low flex indent between">
            <a href="../index.php">Главная</a>
            <a href="../pages/article.php?id=0">Статьи</a>
            <a href="../pages/about.php">О проекте</a>
            <a href="../pages/contests.php">Конкурсы</a>
            <a href="../pages/forum.php?id=0">Форум</a>
        </nav>
        <hr>
    </header>