<?php
require_once('header.php');
require_once('../include/dbconnect.php');
?>
<link rel="stylesheet" href="../css/article.css">
<link rel="stylesheet" href="../css/data.css">

<main class="indent">

    <div class="header_article fix">
        <p>
            <a href="../index.php">Главная</a>><a href="forum.php?id=0">Форум</a>>Создание поста
        </p>
        <h1>
            Создание поста
        </h1>
    </div>

    <div class="fix_inside">
        <h2>Введите данные</h2>
        <hr>
    </div>
    <form action="" id="create_post">
        <section class="feed_form indent fix">
            <label for="">Текст сообщения</label><br>
            <textarea class="feed_text fix_inside" name="text" id="" cols="30" rows="10"></textarea>
        </section>
        <div class="fix_inside">
            <h2>Выберите интиресующую вас категорию</h2>
            <hr>
        </div>
        <section class="feed_form indent">
            <div class="between fix" id="create_categor">
                <?php
                $query = $connect->query("SELECT * FROM `categories`");
                $result = $query->fetchAll();
                foreach ($result as $value) {
                    echo '
                <div class="registr_cat">
                    <input class="checkbox" type="radio" name="add[]" value="' . $value['id'] . '">
                    <label for="">' . $value['title'] . '</label>
                </div>';
                };
                ?>
            </div>
        </section>
        <div class="fix_inside">
            <h2>Выберите интиресующий вас раздел</h2>
            <hr>
        </div>
        <section class="feed_form indent">
            <div class="between fix_inside" id="create_types">
                <?php
                $query = $connect->query("SELECT * FROM `types`");
                $result = $query->fetchAll();
                foreach ($result as $value) {
                    echo '
                <div class="registr_cat">
                    <input class="checkbox" type="radio" name="addTypes[]" value="' . $value['id'] . '">
                    <label for="">' . $value['title'] . '</label>
                </div>';
                };
                ?>
            </div>
            <p class="error" id="error_post"></p>
            <h3 id="text_post" class="fix_inside text_reg"></h3>
            <button class="all fix">Отправить</button>
        </section>
    </form>

</main>
<section class="mission">
    <h2>«Наша миссия — объединить всех, кто неравнодушен к домашним питомцам, кто хочет делиться своим опытом и получать новые знания. Создавать культуру взаимоотношений между людьми и их питомцами».</h2>
</section>
<script src="../script/create_post.js"></script>

<?php
require_once('footer.php');
?>