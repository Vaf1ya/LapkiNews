<?php
require_once('header.php');
require_once('../include/dbconnect.php');
?>
<link rel="stylesheet" href="../css/article.css">
<link rel="stylesheet" href="../css/data.css">

<main class="indent">

    <div class="header_article fix">
        <p>
        <a href="../index.php">Главная</a>>Обратная связь
        </p>
        <h1>
            Обратная связь
        </h1>
    </div>

    <div class="fix_inside">
        <h2>Введите данные</h2>
        <hr>
    </div>

    <section class="feed_form indent">
        <form action="" id="feedback_form">
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
            <label for="">Текст сообщения</label><br>
            <textarea class="feed_text fix_inside" name="text" id="" cols="30" rows="10"></textarea>

            <p class="error" id="error_feedback"></p>
            <h3 id="text_feedback" class="text_reg fix"></h3>

            <button class="all fix">Отправить</button>
        </form>
    </section>



</main>
<section class="mission">
    <h2>«Наша миссия — объединить всех, кто неравнодушен к домашним питомцам, кто хочет делиться своим опытом и получать новые знания. Создавать культуру взаимоотношений между людьми и их питомцами».</h2>
</section>
<script src="../script/feedback.js"></script>

<?php
require_once('footer.php');
?>