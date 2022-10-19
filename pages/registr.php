<?php
require_once('header.php');
require_once('../include/dbconnect.php');
?>
<link rel="stylesheet" href="../css/article.css">
<link rel="stylesheet" href="../css/data.css">

<main class="indent">

    <div class="header_article fix">
        <p>
            <a href="../index.php">Главная</a>>Регистрация
        </p>
        <h1>
            Регистрация
        </h1>
    </div>

    <div class="fix_inside">
        <h2>Введите ваши данные</h2>
        <hr>
    </div>

    <section class="feed_form indent">

        <form id="form_reg">
            <div class="feed_top between fix_inside">
                <div>
                    <label for="">ФИО</label>
                    <input type="text" name="full_name">
                </div>
                <div>
                    <label for="">Адресс электронной почты</label>
                    <input type="text" name="email">
                </div>
            </div>

            <div class="feed_top between fix_inside">
                <div>
                    <label for="">Логин</label>
                    <input type="text" name="login">
                </div>
                <div>
                    <label for="">Номер телефона</label>
                    <input type="text" name="tel">
                </div>
            </div>

            <div class="feed_top between fix_inside">
                <div>
                    <label for="">Пароль</label>
                    <input type="password" name="pass">
                </div>
                <div>
                    <label for="">Повтарите пароль</label>
                    <input type="password" name="repeat_pass">
                </div>
            </div>

            <div class="fix">
                <input class="agreement" type="checkbox" name="data">
                <label for="" id="personal" class="">Согласие на обработку персональных данных</label>
                <p class="error" id="error_reg"></p>
                <h3 id="text_reg" class="text_reg"></h3>
            </div>

            <div class="fix_inside">
                <h3>Выберите интиресующие вас разделы</h3>
                <hr>
            </div>

            <div class="between fix" id="registr_cat">

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

            <button class="all fix">Отправить</button>
        </form>

    </section>

</main>

<section class="mission">
    <h2>«Наша миссия — объединить всех, кто неравнодушен к домашним питомцам, кто хочет делиться своим опытом и получать новые знания. Создавать культуру взаимоотношений между людьми и их питомцами».</h2>
</section>
<script src="../script/registr.js"></script>
<?php
require_once('footer.php');
?>