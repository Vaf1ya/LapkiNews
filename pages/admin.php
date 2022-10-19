<?php
require_once('header.php');
require_once('../include/dbconnect.php');
?>
<link rel="stylesheet" href="../css/article.css">
<link rel="stylesheet" href="../css/data.css">
<link rel="stylesheet" href="../css/forum.css">
<link rel="stylesheet" href="../css/contests.css">
<?php
if ($_COOKIE['user'] == 1) {
    echo '
    <main class="indent">';
    require_once('alert.php');
    echo '<div class="header_article fix">
        <p>
        <a href="../index.php">Главная</a>>Панель администратора
        </p>
        <h1>
            Панель администратора
        </h1>
    </div>



    <div class="fix_inside">
        <h2>Добавление и удаление разделов</h2>
        <hr>
    </div>
    <section class="feed_form indent">
        <div class="feed_top between fix_inside ">
            <div>
                <label for="">Добавить раздел</label>
                <input type="text" id="form_types_add" name="types">
            </div>
            <div class="button">
                <button class="all" id="types_add">Добавить</button>
            </div>
        </div>

        <div class="feed_top between fix">
            <div>
                <label for="">Удалить раздел</label>
                <select name="" id="form_types_delete">';
    $query = $connect->query("SELECT * FROM `types`");
    $result = $query->fetchAll();
    foreach ($result as $value) {
        echo '<option value="' . $value['id'] . '">' . $value['title'] . '</option>';
    }
    echo '</select>
            </div>
            <div class="button">
                <button class="all" id="types_delete">Удалить</button>
            </div>
        </div>
    </section>

    <section>
        <div class="menu fix_inside">
            <h2>Модерация</h2>
            <h3 class="border" id="post_mod">Посты</h3>
            <h3 id="comment_mod">Комментарии</h3>
            <h3 id="review_mod">Отзывы</h3>
            <h3 id="create_article_mod">Создание статей</h3>
            <h3 id="create_contests_mod">Конкурсы</h3>
            <hr>
        </div>
        <div id="post_mod_form" class="indent fix">';
    $query = $connect->query("SELECT * FROM `post` WHERE `status` = 'Новое'");
    $result = $query->fetchAll();
    foreach ($result as $value) {
        $id_user = $value['id_user'];
        echo '
                     <div class="parent">
                     <div class="post fix_inside">';
        $user = $connect->query("SELECT * FROM `users` WHERE `id`=$id_user");
        $result_user = $user->fetchAll();
        foreach ($result_user as $value_user) {
            echo '<img class="ava_post" src="' . $value_user['path_img'] . '' . $value_user['name_img'] . '" alt="">
                         <div class="form_post">
                             <div class="between flex">
                                 <div class="flex">
                                    <p class="name_user">' . $value_user['login'] . '</p>
                                 ';
        }
        $likes = $connect->query("SELECT * FROM `likes` WHERE `id_user` = $id_user");
        $result_likes = $likes->fetchAll();
        if (count($result_likes) > 30) {
            echo '<p>Эксперт</p>';
        } else if (count($result_likes) > 20) {
            echo '<p>Мастер</p>';
        } else if (count($result_likes) > 10) {
            echo '<p>Знаток</p>';
        } else {
            echo '<p>Новичек</p>';
        }
        $id_cat = $value['id_cat'];
        $category = $connect->query("SELECT * FROM `categories` WHERE `id`=$id_cat ");
        $result_cat = $category->fetchAll();
        foreach ($result_cat as $value_cat) {
            echo ' </div><p>#' . $value_cat['title'];
        };

        echo '
                        </p></div>
                        <p class="text_post">' . $value['text'] . '</p>
                        <div class="between flex">
                            <div class="icon flex">
                                </div>
                                <p>' . $value['date'] . '</p>
                            </div>
                        </div>
                    </div>
                    <div class="fix_inside button_admin">
                        <button class="post_delete_admin" id="post_delete' . $value['id'] . '">Удaлить</button>
                        <button class="post_approve_admin" id="post_approve' . $value['id'] . '">Одобрить</button>
                    </div>';
    }
    echo ' </div>
    </section>

    <section id="comment_mod_form" class="fix display_none indent" >';
    echo '<div>';
    $comment = $connect->query("SELECT * FROM `comment` WHERE `status` = 'Новое'");
    $result_comment = $comment->fetchAll();
    foreach ($result_comment as $value_comment) {
        $id_user_comment = $value_comment['id_user'];
        $user_comment = $connect->query("SELECT * FROM `users` WHERE `id`=$id_user_comment");
        $result_user_comment = $user_comment->fetchAll();
        foreach ($result_user_comment as $value_user_comment) {
            echo '<div class="comment_admin fix_inside">
                    <img class="ava_comment" src="' . $value_user_comment['path_img'] . '' . $value_user_comment['name_img'] . '" alt="">

                    <div class="form_comment">
                        <div class="between flex">
                            <div class="flex">
                                <p class="name_user">' . $value_user_comment['login'] . '</p>';
        }
        $likes = $connect->query("SELECT * FROM `likes` WHERE `id_user` = $id_user_comment");
        $result_likes = $likes->fetchAll();
        if (count($result_likes) > 30) {
            echo '<p>Эксперт</p>';
        } else if (count($result_likes) > 20) {
            echo '<p>Мастер</p>';
        } else if (count($result_likes) > 10) {
            echo '<p>Знаток</p>';
        } else {
            echo '<p>Новичек</p>';
        }
        echo '
                            </div>
                        </div>
                        <p class="text_post">' . $value_comment['text'] . '</p>
                        <div class="between flex">
                            <div class="icon flex">
                            </div>
                            <p>' . $value_comment['date'] . '</p>
                        </div>
                    </div>
                </div></div>
                <div class="fix_inside button_admin">
                    <button class="comment_delete_admin" id="comment_delete' . $value_comment['id'] . '">Удaлить</button>
                    <button class="comment_approve_admin" id="comment_approve' . $value_comment['id'] . '">Одобрить</button>
                </div>';
    }
    echo '

    </section>

    <section class="fix display_none" id="review_mod_form">
        <div class="indent">';
    $query = $connect->query("SELECT * FROM `review` WHERE `status`='Новое'");
    $result = $query->fetchAll();
    foreach ($result as $value) {
        $user = $value['id_user'];
        $users = $connect->query("SELECT * FROM `users` WHERE `id`=$user");
        $result_users = $users->fetchAll();
        foreach ($result_users as $value_users) {
            echo '
                    <div class="review_admin fix_inside">
                    <div class="review">
                        <img src="' . $value_users['path_img'] . '' . $value_users['name_img'] . '" alt="">
                        <div class="review_text">
                        <h2>' . $value_users['login'] . '</h2>';
        };
        echo '
                <p>' . $value['text'] . '</p>
                </div></div></div>
                <div class="fix_inside button_admin">
                    <button class="review_delete_admin" id="review_delete' . $value['id'] . '">Удaлить</button>
                    <button class="review_approve_admin" id="review_approve' . $value['id'] . '">Одобрить</button>
                </div>';
    };
    echo '</div>

    </section>

    <section class="fix display_none" id="create_article_form">
        <form id="fileForm" enctype="multipart/form-data">
            <div class="indent">
                <div class="fix_inside">
                    <h3>Выберите категории статьи</h3>
                    <hr>
                </div>
                <div class="between fix" id="categor_article_admin">';
    $query = $connect->query("SELECT * FROM `categories`");
    $result = $query->fetchAll();
    foreach ($result as $value) {
        echo '
                <div class="registr_cat">
                    <input class="checkbox" type="radio" name="add[]" value="' . $value['id'] . '">
                    <label for="">' . $value['title'] . '</label>
                </div>';
    };
    echo '</div>
                <div class="fix_inside">
                    <h3>Выберите разделы статьи</h3>
                    <hr>
                </div>
                <div class="between fix_inside" id="types_article_admin">';
    $query = $connect->query("SELECT * FROM `types`");
    $result = $query->fetchAll();
    foreach ($result as $value) {
        echo '
                <div class="registr_cat">
                    <input class="checkbox" type="radio" name="addTypes[]" value="' . $value['id'] . '">
                    <label for="">' . $value['title'] . '</label>
                </div>';
    };
    echo '</div>
                <div class="feed_top between fix_inside ">
                    <div>
                        <label for="">Название статьи</label>
                        <input type="text" id="title_article_admin" name="title">
                    </div>
                    <div class="button">
                        <label for="">Выберите картинку статьи</label>
                        <input type="file" id="photo_admin" name="photo">
                    </div>
                </div>
                <div class="menu fix_inside">
                    <h3>Добавление глав: </h3>
                    <h3 class="border" id="chapter1">Глава 1</h3>
                    <h3 id="chapter2">Глава 2</h3>
                    <h3 id="chapter3">Глава 3</h3>
                    <h3 id="chapter4">Глава 4</h3>
                    <h3 id="chapter5">Глава 5</h3>
                    <h3 id="chapter6">Глава 6</h3>
                    <hr>
                </div>
                <section id="form_chapter1">
                    <div class="feed_top between fix_inside ">
                        <div>
                            <label for="">Название главы 1</label>
                            <input type="text" name="chapter1_title">
                        </div>
                    </div>
                    <div class="feed_form fix_inside">
                        <label for="">Текст главы 1</label><br>
                        <textarea class="feed_text fix_inside" name="chapter1_text" cols="30" rows="10"></textarea>
                    </div>
                </section>
                <section id="form_chapter2" class="display_none">
                    <div class="feed_top between fix_inside ">
                        <div>
                            <label for="">Название главы 2</label>
                            <input type="text" name="chapter2_title">
                        </div>
                    </div>
                    <div class="feed_form fix_inside">
                        <label for="">Текст главы 2</label><br>
                        <textarea class="feed_text fix_inside" name="chapter2_text" cols="30" rows="10"></textarea>
                    </div>
                </section>
                <section id="form_chapter3" class="display_none">
                    <div class="feed_top between fix_inside ">
                        <div>
                            <label for="">Название главы 3</label>
                            <input type="text" name="chapter3_title">
                        </div>
                    </div>
                    <div class="feed_form fix_inside">
                        <label for="">Текст главы 3</label><br>
                        <textarea class="feed_text fix_inside" name="chapter3_text" cols="30" rows="10"></textarea>
                    </div>
                </section>
                <section id="form_chapter4" class="display_none">
                    <div class="feed_top between fix_inside ">
                        <div>
                            <label for="">Название главы 4</label>
                            <input type="text" name="chapter4_title">
                        </div>
                    </div>
                    <div class="feed_form fix_inside">
                        <label for="">Текст главы 4</label><br>
                        <textarea class="feed_text fix_inside" name="chapter4_text" cols="30" rows="10"></textarea>
                    </div>
                </section>
                <section id="form_chapter5" class="display_none">
                    <div class="feed_top between fix_inside ">
                        <div>
                            <label for="">Название главы 5</label>
                            <input type="text" name="chapter5_title">
                        </div>
                    </div>
                    <div class="feed_form fix_inside">
                        <label for="">Текст главы 5</label><br>
                        <textarea class="feed_text fix_inside" name="chapter5_text" cols="30" rows="10"></textarea>
                    </div>
                </section>
                <section id="form_chapter6" class="display_none">
                    <div class="feed_top between fix_inside ">
                        <div>
                            <label for="">Название главы 6</label>
                            <input type="text" name="chapter6_title">
                        </div>
                    </div>
                    <div class="feed_form fix_inside">
                        <label for="">Текст главы 6</label><br>
                        <textarea class="feed_text fix_inside" name="chapter6_text" cols="30" rows="10"></textarea>
                    </div>
                </section>
                <p class="error fix_inside" id="error_admin"></p>
                <div class="fix_inside button_admin">
                    <button type="submit" class="" id="form_article_add">Добавить</button>
                </div>
            </div>
        </form>
    </section>

    <section class="fix display_none indent" id="contests_form">
        <form id="fileForm_contests" enctype="multipart/form-data">
        
                <div class="fix_inside">
                    <h3>Создание конкурса</h3>
                    <hr>
                </div>
                    <div class="feed_top between fix_inside ">
                        <div>
                            <label for="">Название конкурса</label>
                            <input type="text" id="title_contests_admin" name="title">
                        </div>
                        <div class="button">
                            <label for="">Дата окончания конкурса</label>
                            <input type="date" id="date_contests_admin" name="date">
                        </div>
                    </div>
                    <div class="feed_top between fix_inside ">
                        <div class="button">
                            <label for="">Выберите картинку конкурса</label>
                            <input type="file" id="photo_contests_admin" name="photo_contests">
                        </div>
                    </div>
                    
                    <p class="error fix_inside" id="error_contests_admin"></p>
                    <div class="fix_inside button_admin">
                        <button type="submit" class="" id="form_contests_add">Создать конкурс</button>
                    </div>
        </form>
        <div class="fix_inside">
            <h3>Подведение итогов</h3>
            <hr>
        </div>
        <div class="fix">';
    $query = $connect->query("SELECT * FROM `contests` WHERE `status`='Новое'");
    $result = $query->fetchAll();
    foreach ($result as $value) {
        echo '
            
                <div class="contests_active_form fix_inside">
                    <div class="flex">
                        <div class="text_contests contests_active">
                            
                            <h2>' . $value['title'] . '</h2>
                            <ul>
                                <li>Выигрывай различные призы</li>
                                <li>Повышай культуру содержания питомцев</li>
                                <li>Принимай активное участие в жизни сайта</li>
                            </ul>
                        </div>
                        <div class="contests_active">
                            <img src="' . $value['path_img'] . '' . $value['name_img'] . '" alt="">
                        </div>
                    </div>
                </div>
                <input id="id_contests" type="hidden" name="id" value="' . $value['id'] . '">
                <div class="fix_inside button_admin">
                    <button id="completed_contests_btn" type="submit" class="">Завершить</button>
                </div>
            ';
    };

    echo ' </div></section>
</main>
    ';
} else {
    echo '<h1 class="pages_admin_error">У вас нет доступа к этой странице</h1>';
}
?>


<section class="mission">
    <h2>«Наша миссия — объединить всех, кто неравнодушен к домашним питомцам, кто хочет делиться своим опытом и получать новые знания. Создавать культуру взаимоотношений между людьми и их питомцами».</h2>
</section>

<script src="../script/admin.js"></script>
<script src="../script/admin_menu.js"></script>

<?php
require_once('footer.php');
?>