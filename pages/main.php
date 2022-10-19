<?php
require_once('include/dbconnect.php');
?>
<section class="info">
    <h1>Просто любите своих питомцев, а заботы оставьте нам!</h1>
</section>
<hr class="fix">
<main class="indent">

    <div class="fix_inside">
        <h1>Выбери своего питомца</h1>
        <p>читайте новости о вашем питомце</p>
    </div>

    <section class="category_form fix">
        <div class="category_all flex between">
            <?php
            $query = $connect->query("SELECT * FROM `categories` ORDER BY `id` LIMIT 2");
            $result = $query->fetchAll();
            foreach ($result as $value) {
                echo '
                    <div class="category_top flex">
                    <img src="' . $value['path_img'] . '' . $value['name_img'] . '" alt="">
                        <div>
                            <h2>' . $value['title'] . '</h2>
                            <p>Интересная и полезная информация портала ЛапкиNews. На сайте собраны статьи о том как кормить, как воспитывать, как ухаживать за вашими любимыми питомцами.</p>
                            <a href="../pages/article.php?id=' . $value['id'] . '">Перейти</a>
                        </div>
                    </div>';
            };
            ?>

        </div>

        <div class="flex">

            <?php
            $query = $connect->query("SELECT * FROM `categories` ORDER BY `id` LIMIT 2,50");
            $result = $query->fetchAll();
            foreach ($result as $value) {
                echo '
                <div class="category" style="background: url(' . $value['path_img'] . '' . $value['name_img'] . '); background-size: cover;">
                <a href="../pages/article.php?id=' . $value['id'] . '"> <h2>' . $value['title'] . '</h2></a>
                </div>';
            };
            ?>

        </div>
    </section>

    <div class="fix_inside">
        <h1>Новинки</h1>
    </div>

    <section class="articles_all fix">

        <div class="articl flex">
            <?php
            $query = $connect->query("SELECT * FROM `articles` ORDER BY `date` DESC LIMIT 1");
            $result = $query->fetchAll();
            foreach ($result as $value) {
                echo '
                    <a href="../pages/page.php?id=' . $value['id'] . '" class="flex">
                    <img src="' . $value['path_img'] . '' . $value['name_img'] . '" alt="">
                    <div class="articl_dis">
                        <h2>' . $value['title'] . '</h2>';
                $id = $value['id'];
                $id_cat = $value['id_cat'];
                $text = $connect->query("SELECT * FROM `chapters` WHERE `id_articles`=$id ORDER BY `id` LIMIT 1");
                $result_text = $text->fetchAll();
                foreach ($result_text as $value_text) {
                    echo '<label class="description">' . $value_text['text'] . '</label>';
                };
                echo '
                    <div class="between flex">
                        <p>' . $value['date'] . '</p>
                        <p>';
                $cat = explode(",", $id_cat);
                foreach ($cat as $value_cat) {
                    $category = $connect->query("SELECT * FROM `categories` WHERE `id`=$value_cat ");
                    $result_cat = $category->fetchAll();
                    foreach ($result_cat as $value_category) {
                        echo ' #' . $value_category['title'];
                    };
                };
                echo '</p></div></div></a>';
            };
            ?>
        </div>
        <div class="articls_form between flex">
            <?php
            $query = $connect->query("SELECT * FROM `articles` ORDER BY `date` DESC LIMIT 1,4");
            $result = $query->fetchAll();
            foreach ($result as $value) {
                echo '
                    <div class="articles">
                    <a href="../pages/page.php?id=' . $value['id'] . '">
                    <img class="articles_logo" src="' . $value['path_img'] . '' . $value['name_img'] . '" alt="">
                    <h3>' . $value['title'] . '</h3>';
                $id = $value['id'];
                $text = $connect->query("SELECT * FROM `chapters` WHERE `id_articles`=$id ORDER BY `id` LIMIT 1");
                $result_text = $text->fetchAll();
                foreach ($result_text as $value_text) {
                    echo '<label class="description">' . $value_text['text'] . '</label>';
                };
                echo '
                    <div class="date flex between">
                        <p>' . $value['date'] . '</p>
                        <div class="icon flex"><img src="../img/views.png" alt="">
                            <p>' . $value['views'] . '</p>
                        </div>
                        <div class="icon flex"><img src="../img/like.png" alt="">
                            <p>' . $value['likes'] . '</p>
                        </div>
                    </div>
                    <span>';
                $id_cat = $value['id_cat'];
                $cat = explode(",", $id_cat);
                foreach ($cat as $value_cat) {
                    $category = $connect->query("SELECT * FROM `categories` WHERE `id`=$value_cat ");
                    $result_cat = $category->fetchAll();
                    foreach ($result_cat as $value_category) {
                        echo ' #' . $value_category['title'];
                    };
                };
                echo '</span></a></div>';
            };
            ?>

        </div>
    </section>

    <hr>
    <section class="contact flex between">
        <div>
            <h1>Мы видем активную жизнь в социальных сетях, вступай в наши группы и получай призы</h1>
            <nav class="flex between">
                <a href="/products">В контакте</a>
                <a href="/services">Однокласники</a>
                <a href="/blog">WhatsApp</a>
                <a href="/contacts">Mail</a>
            </nav>
        </div>
        <img src="../img/piple.png" alt="">
    </section>
    <hr class="fix">

    <div class="fix_inside">
        <h1>Рекомендации</h1>
    </div>

    <section class="articles_all fix">

        <div class="articl flex">
            <?php
            $query = $connect->query("SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 1");
            $result = $query->fetchAll();
            foreach ($result as $value) {
                echo '
                    <a href="../pages/page.php?id=' . $value['id'] . '" class="flex">
                    <img src="' . $value['path_img'] . '' . $value['name_img'] . '" alt="">
                    <div class="articl_dis">
                        <h2>' . $value['title'] . '</h2>';
                $id = $value['id'];
                $id_cat = $value['id_cat'];
                $text = $connect->query("SELECT * FROM `chapters` WHERE `id_articles`=$id ORDER BY `id` LIMIT 1");
                $result_text = $text->fetchAll();
                foreach ($result_text as $value_text) {
                    echo '<label class="description">' . $value_text['text'] . '</label>';
                };
                echo '
                    <div class="between flex">
                        <p>' . $value['date'] . '</p>
                        <p>';
                $cat = explode(",", $id_cat);
                foreach ($cat as $value_cat) {
                    $category = $connect->query("SELECT * FROM `categories` WHERE `id`=$value_cat ");
                    $result_cat = $category->fetchAll();
                    foreach ($result_cat as $value_category) {
                        echo ' #' . $value_category['title'];
                    };
                };
                echo '</p></div></div></a>';
            };
            ?>
        </div>
        <div class="articls_form between flex">
            <?php
            $query = $connect->query("SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 1,4");
            $result = $query->fetchAll();
            foreach ($result as $value) {
                echo '<div class="articles">
                    <a href="../pages/page.php?id=' . $value['id'] . '">
                    <img class="articles_logo" src="' . $value['path_img'] . '' . $value['name_img'] . '" alt="">
                    <h3>' . $value['title'] . '</h3>';
                $id = $value['id'];
                $text = $connect->query("SELECT * FROM `chapters` WHERE `id_articles`=$id ORDER BY `id` LIMIT 1");
                $result_text = $text->fetchAll();
                foreach ($result_text as $value_text) {
                    echo '<label class="description">' . $value_text['text'] . '</label>';
                };
                echo '
                    <div class="date flex between">
                        <p>' . $value['date'] . '</p>
                        <div class="icon flex"><img src="../img/views.png" alt="">
                            <p>' . $value['views'] . '</p>
                        </div>
                        <div class="icon flex"><img src="../img/like.png" alt="">
                            <p>' . $value['likes'] . '</p>
                        </div>
                    </div>
                    <span>';
                $id_cat = $value['id_cat'];
                $cat = explode(",", $id_cat);
                foreach ($cat as $value_cat) {
                    $category = $connect->query("SELECT * FROM `categories` WHERE `id`=$value_cat ");
                    $result_cat = $category->fetchAll();
                    foreach ($result_cat as $value_category) {
                        echo ' #' . $value_category['title'];
                    };
                };
                echo '</span></a></div>';
            };
            ?>

        </div>
    </section>

    <section class="about fix flex between">
        <div class="about_dis">
            <h1 class="fix_inside">О проекте</h1>
            <h2>Сообщество «ЛапкиNews» объединяет всех, кто неравнодушен к домашним питомцам, считаетих полноправными членами семьи, хочет делиться опытом и получать новые знания.</h2>
            <a href="../pages/about.php"><button>Подробнее</button></a>
        </div>
        <div>
            <img src="../img/about.png" alt="">
        </div>

    </section>

    <div class="fix_inside">
        <h1>Отзывы</h1>
    </div>

    <section class="review_all flex fix between">
        <?php
        $query = $connect->query("SELECT * FROM `review` WHERE `status`='Обработано' ORDER BY `id` DESC LIMIT 2");
        $result = $query->fetchAll();
        foreach ($result as $value) {
            $user = $value['id_user'];
            $users = $connect->query("SELECT * FROM `users` WHERE `id`=$user");
            $result_users = $users->fetchAll();
            foreach ($result_users as $value_users) {
                echo '
                    <div class="review">
                        <img src="' . $value_users['path_img'] . '' . $value_users['name_img'] . '" alt="">
                        <div class="review_text">
                        <h2>' . $value_users['login'] . '</h2>';
            };
            echo '
            <p>' . $value['text'] . '</p>
                </div>
            </div>
            ';
        };
        ?>
    </section>

</main>
<section class="mission">
    <h2>«Наша миссия — объединить всех, кто неравнодушен к домашним питомцам, кто хочет делиться своим опытом и получать новые знания. Создавать культуру взаимоотношений между людьми и их питомцами».</h2>
</section>