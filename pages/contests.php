<?php
require_once('header.php');
require_once('../include/dbconnect.php');
?>
<link rel="stylesheet" href="../css/article.css">
<link rel="stylesheet" href="../css/contests.css">
<main class="indent">

    <div class="header_article fix">
        <p><a href="../index.php">Главная</a>>Конкурсы</p>
        <h1>Конкурсы</h1>
    </div>

    <section class="about_div flex fix">

        <div class="text_contests">
            <h2>Участвуй в конкурсах</h2>
            <ul>
                <li>Выигрывай качественные продукты для питомцев</li>
                <li>Повышай культуру содержания питомцев</li>
                <li>Стань участником сообщества</li>
            </ul>
        </div>

        <div>
            <img src="../img/aboutlogo.png" alt="">
        </div>
    </section>
    <section>
        <div class="menu_contests fix_inside">
            <h3 id="active_contests" class="border">Активные</h3>
            <h3 id="completed_contests">Завершенные</h3>
            <hr>
        </div>
        <div id="active_contests_form" class="indent fix">
            <?php
            $query = $connect->query("SELECT * FROM `contests` WHERE `status`='Новое'");
            $result = $query->fetchAll();
            foreach ($result as $value) {
                echo '
                
                    <div class="contests_active_form fix">
                        <div class="flex">
                            <div class="text_contests contests_active">
                                
                                <h2>' . $value['title'] . '</h2>
                                <ul>
                                    <li>Выигрывай различные призы</li>
                                    <li>Повышай культуру содержания питомцев</li>
                                    <li>Принимай активное участие в жизни сайта</li>
                                </ul>
                                <p id="terms">Условия конкурса</p>
                            </div>
                            <div class="contests_active">
                                <img src="' . $value['path_img'] . '' . $value['name_img'] . '" alt="">
                            </div>
                        </div>
                            <span id="terms_form" class="display_none"">
                                <p class="text_terms">
                                    Всем привет! Наступил новый сезон и наша команда решила провести для наших активных читателей ещё один конкурс.
                                </p>
                                <p class="text_terms">
                                    Участвуя в этом конкурсе, у вас есть возможность выиграть разнообразны подарки, начиная от купона со скидкой в 50%, заканчивая набором вкусняшек для вашего любимца.                        
                                </p>
                                <p class="text_terms">
                                    Чтобы стать участником розыгрыша, выполните 1 простое условие: - Поставьте лайк на 1 любую статью, дата публикации которой не раньше начала конкурса.       
                                </p>
                                <p class="text_terms">
                                    "' . $value['end_date'] . '" числа мы подведем итоги.
                                </p>
                                <p class="text_terms">
                                    Прими участие и получи крутые подарки!
                                </p>
                            </span>
                    </div>
                ';
            };
            ?>
        </div>
        <div id="completed_contests_form" class="indent fix display_none">
            <?php
            $query = $connect->query("SELECT * FROM `contests` WHERE `status`='Завершенное'");
            $result = $query->fetchAll();
            foreach ($result as $value) {
                echo '
                
                    <div class="contests_active_form fix">
                        <div class="flex">
                            <div class="text_contests contests_active">
                                
                                <h2>' . $value['title'] . '</h2>
                                <ul>
                                    <li>Выигрывай различные призы</li>
                                    <li>Повышай культуру содержания питомцев</li>
                                    <li>Принимай активное участие в жизни сайта</li>
                                </ul>
                                <p>Победитель: ';
                $winner = $value['winner'];
                $query_winner = $connect->query("SELECT * FROM `users` WHERE `id`=$winner");
                $result_winner = $query_winner->fetchAll();
                foreach ($result_winner as $value_winner) {
                    echo $value_winner['login'];
                };
                echo '</p>
                            </div>
                            <div class="contests_active">
                                <img src="' . $value['path_img'] . '' . $value['name_img'] . '" alt="">
                            </div>
                        </div>
                    </div>
                ';
            };
            ?>
        </div>
    </section>

</main>
<section class="mission">
    <h2>«Наша миссия — объединить всех, кто неравнодушен к домашним питомцам, кто хочет делиться своим опытом и получать новые знания. Создавать культуру взаимоотношений между людьми и их питомцами».</h2>
</section>

<script src="../script/contests_menu.js"></script>
<?php
require_once('footer.php');
?>