<?php
require_once('header.php');
require_once('../include/dbconnect.php');
?>
<link rel="stylesheet" href="../css/article.css">
<link rel="stylesheet" href="../css/data.css">

<main class="indent">

    <div class="header_article fix">
        <p>
            <a href="../index.php">Главная</a>>Личный кабинет
        </p>
        <h1>
            Личный кабинет
        </h1>
    </div>

    <?php
    $user = $_COOKIE['user'];
    $query = $connect->query("SELECT * FROM `users` WHERE `id`=$user");
    $result = $query->fetchAll();
    foreach ($result as $value) {
        echo '
                <div class="flex fix">
        <div class="avatar_form" style="background: url(' . $value['path_img'] . '' . $value['name_img'] . '); background-size: cover;">
            <img id="ava_update" src="../img/plus.png" alt="">
        </div>

        <div>
                <p class="user_data">ФИО: ' . $value['full_name'] . '</p>
                <p class="user_data">Имя пользователя: ' . $value['login'] . '</p>
                <p class="user_data">Email: ' . $value['email'] . '</p>
                <p class="user_data">Номер телефона: ' . $value['tel'] . '</p>
        ';
        $likes = $connect->query("SELECT * FROM `likes` WHERE `id_user` = $user");
        $result_likes = $likes->fetchAll();
        if (count($result_likes) > 30) {
            echo '<p class="user_data">Статус пользователя: Эксперт</p>';
        } else if (count($result_likes) > 20) {
            echo '<p class="user_data">Статус пользователя: Мастер</p>';
        } else if (count($result_likes) > 10) {
            echo '<p class="user_data">Статус пользователя: Знаток</p>';
        } else {
            echo '<p class="user_data">Статус пользователя: Новичек</p>';
        }
    };
    ?>

    </div>

    </div>

    <div class="menu fix_inside ">
        <h3 class="border" id="updata">Изменить данные</h3>
        <h3 id="uppass">Изменить пароль</h3>
        <h3 id="upcategor">Изменить разделы</h3>
        <h3 id="review">Оставить отзыв</h3>
        <h3 id="likes">Поравившиеся статьи</h3>
        <hr>
    </div>

    <section class="feed_form indent">
        <form action="" id="updata_form">
            <div class="feed_top between fix_inside">
                <div>
                    <label for="">Изменить ФИО</label>
                    <input type="text" name="full_name">
                </div>
                <div>
                    <label for="">Изменить имя пользователя</label>
                    <input type="text" name="login">
                </div>
            </div>

            <div class="feed_top between fix_inside">
                <div>
                    <label for="">Изменить имеил</label>
                    <input type="text" name="email">
                </div>
                <div>
                    <label for="">Изменить номр телефона</label>
                    <input type="text" name="tel">
                </div>
            </div>
            <div class="fix">
                <p class="error" id="error_updata"></p>
                <h3 id="text_updata" class="text_reg"></h3>
            </div>
            <button class="all fix">Изменить</button>
        </form>
    </section>

    <section class="feed_form indent">
        <form class="display_none" action="" id="uppass_form">
            <div class="feed_top between fix_inside">
                <div>
                    <label for="">Введите новый пароль</label>
                    <input type="text" name="new_pass">
                </div>
                <div>
                    <label for="">Ведите старый пароль</label>
                    <input type="text" name="pass">
                </div>
            </div>
            <div class="fix">
                <p class="error" id="error_uppass"></p>
                <h3 id="text_uppass" class="text_reg"></h3>
            </div>

            <button class="all fix">Изменить</button>
        </form>
    </section>

    <section class="feed_form indent">
        <form action="" class="display_none" id="upcategor_form">
            <div class="between fix_inside">
                <?php
                $query = $connect->query("SELECT * FROM `categories`");
                $result = $query->fetchAll();
                foreach ($result as $value) {
                    echo '
                <div class="registr_cat">
                    <input class="checkbox" type="checkbox" name="add[]" value="' . $value['id'] . '">
                    <label for="">' . $value['title'] . '</label>
                </div>';
                };
                ?>
            </div>
            <div class="fix">
                <p class="error" id="error_upcategor"></p>
                <h3 id="text_upcategor" class="text_reg"></h3>
            </div>
            <button class="all fix">Изменить</button>
        </form>
    </section>

    <section class="indent">
        <form action="" id="review_form" class="display_none">
            <div class="fix_inside">
                <label for="">Текст сообщения</label><br>
                <textarea class="feed_text" name="text_review" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="fix">
                <p class="error" id="error_review"></p>
                <h3 id="text_review" class="text_reg"></h3>
            </div>
            <div class="button fix ">
                <button class="all">Отправить</button>
            </div>
        </form>
    </section>

    <section class="display_none" id="likes_form">
        <div class="fix">

            <div class="articles_all flex">
                <?php
                $id = $_COOKIE['user'];
                $query = $connect->query("SELECT * FROM `likes` WHERE id_user=$id");
                $result = $query->fetchAll();
                foreach ($result as $value) {
                    $id_article = $value['id_article'];
                    $article = $connect->query("SELECT * FROM `articles` WHERE `id`=$id_article");
                    $result_article = $article->fetchAll();
                    foreach ($result_article as $value_article)
                        echo '
                        <a href="../pages/page.php?id=' . $value_article['id'] . '" class="fix_inside">
                        <div class="article ">
                        <img class="article_logo" src="' . $value_article['path_img'] . '' . $value_article['name_img'] . '" alt="">
                        <h3>' . $value_article['title'] . '</h3>
                            <div class="date flex between">
                                <p>
                                ' . $value_article['date'] . '
                                </p>
                                <div class="icon flex"><img src="../img/views.png" alt="">
                                    <p>' . $value_article['views'] . '</p>
                                </div>
                                <div class="icon flex"><img src="../img/like.png" alt="">
                                    <p>' . $value_article['likes'] . '</p>
                                </div>
                            </div><br><p>';
                    $id_cat = $value_article['id_cat'];
                    $cat = explode(",", $id_cat);
                    foreach ($cat as $value_cat) {
                        $category = $connect->query("SELECT * FROM `categories` WHERE `id`=$value_cat ");
                        $result_cat = $category->fetchAll();
                        foreach ($result_cat as $value_category) {
                            echo ' #' . $value_category['title'];
                        };
                    };
                    echo '
                        </p></div></a>';
                };
                ?>
            </div>
        </div>

    </section>


</main>
<section class="mission">
    <h2>«Наша миссия — объединить всех, кто неравнодушен к домашним питомцам, кто хочет делиться своим опытом и получать новые знания. Создавать культуру взаимоотношений между людьми и их питомцами».</h2>
</section>
<script src="../script/update.js"></script>
<script src="../script/cabinet.js"></script>
<script src="../script/ava.js"></script>
<?php
require_once('footer.php');
?>