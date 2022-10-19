<?php
require_once('header.php');
require_once('../include/dbconnect.php');
?>
<link rel="stylesheet" href="../css/article.css">
<link rel="stylesheet" href="../css/forum.css">

<main class="indent">
    <?php
    require_once('alert.php')
    ?>
    <div class="header_article fix">
        <p><a href="../index.php">Главная</a>>Форум</p>
        <h1>Форум</h1>
    </div>

    <hr>
    <nav class="flex between fix_inside">
        <a href="forum.php?id=0">Все</a>
        <?php
        $query = $connect->query("SELECT * FROM `categories`");
        $result = $query->fetchAll();
        foreach ($result as $value) {
            echo '
                <a href="forum.php?id=' . $value['id'] . '">' . $value['title'] . '</a>
                ';
        }
        ?>
    </nav>

    <div class="top between flex fix_inside">
        <h2>
            <?php
            $id = $_GET['id'];
            if ($id == '0') {
                echo 'Всё';
            } else {
                $query = $connect->prepare("SELECT * FROM `categories` WHERE `id`=:id");
                $query->execute(['id' => $id]);
                $result = $query->fetchAll();
                foreach ($result as $value) {
                    echo $value['title'];
                }
            }
            ?>
        </h2>
        <?php
        if (!empty($_COOKIE['user'])) {
            echo '<a href="creat.php">Создать пост</a>';
        }
        ?>
    </div>

    <section class="main_basic flex fix">
        <div class="main_art">
            <div class="categor_art">
                <?php
                $query = $connect->query("SELECT * FROM `types`");
                $result = $query->fetchAll();
                foreach ($result as $value) {
                    echo '<a href="forum.php?id=' . $_GET['id'] . '&idtype=' . $value['id'] . '">' . $value['title'] . '</a>';
                };
                ?>
            </div>
            <div class="cont_art">
                <h2>Контакты</h2>
                <div class="contact_logo flex">
                    <img src="../img/vk.png" alt="">
                    <img src="../img/ok.png" alt="">
                    <img src="../img/wat.png" alt="">
                    <img src="../img/mail.png" alt="">
                </div>
            </div>
        </div>
        <div class="indent form_forum">
            <?php
            require_once('../include/filter_forum.php')
            ?>
        </div>
    </section>
</main>

<section class="mission">
    <h2>«Наша миссия — объединить всех, кто неравнодушен к домашним питомцам, кто хочет делиться своим опытом и получать новые знания. Создавать культуру взаимоотношений между людьми и их питомцами».</h2>
</section>
<script src="../script/forum.js"></script>
<?php
require_once('footer.php');
?>