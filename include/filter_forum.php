<?php
require_once('dbconnect.php');
if ($_GET['id'] == '0' && $_GET['idtype'] > 0) {
    $idtype = $_GET['idtype'];
    $query = $connect->query("SELECT * FROM `post` WHERE `status` = 'Обработано' AND id_types=$idtype");
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
                        <div class="icon flex">';
                            echo '<a class="show_comment show_comment_btn" >Показать коментарии</a>';
        if (!empty($_COOKIE['user'])) {
            echo '<a class="add_comment_btn">Оставить коментарий</a>';
        }
        echo '
                            </div>
                            <p>' . $value['date'] . '</p>
                        </div>
                    </div>
                </div>
                <div class="display_none">';
        $id = $value['id'];
        $comment = $connect->query("SELECT * FROM `comment` WHERE id_post=$id AND `status` = 'Обработано'");
        $result_comment = $comment->fetchAll();
        foreach ($result_comment as $value_comment) {
            $id_user_comment = $value_comment['id_user'];
            $user_comment = $connect->query("SELECT * FROM `users` WHERE `id`=$id_user_comment");
            $result_user_comment = $user_comment->fetchAll();
            foreach ($result_user_comment as $value_user_comment) {
                echo '<div class="comment fix_inside">
                    <img class="ava_comment" src="' . $value_user['path_img'] . '' . $value_user['name_img'] . '" alt="">

                    <div class="form_comment">
                        <div class="between flex">
                            <div class="flex">
                                <p class="name_user">' . $value_user['login'] . '</p>';
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
                            <div class="icon flex">';
                            echo  '</div>
                            <p>' . $value_comment['date'] . '</p>
                        </div>
                    </div>
                </div>';
        }
        echo '</div>
                <div class="add_comment_form fix_inside display_none">
                    <div class="form_create_comment">
                    ';
                    echo '
                        <textarea class="text_create_comment text" id="" rows="1"></textarea>
                        <img id="' . $value['id'] . '" class="ava_create_comment create_comment_btn" src="../img/comment.png" alt="">
                    </div>
                </div>
                </div>
                    ';
    }
} else if ($_GET['idtype'] > 0) {
    $idtype = $_GET['idtype'];
    $id = $_GET['id'];
    $query = $connect->query("SELECT * FROM `post` WHERE `status` = 'Обработано' AND id_types=$idtype AND id_cat = $id");
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
                        <div class="icon flex">';
                            echo '<a class="show_comment show_comment_btn" >Показать коментарии</a>';
        if (!empty($_COOKIE['user'])) {
            echo '<a class="add_comment_btn">Оставить коментарий</a>';
        }
        echo '
                            </div>
                            <p>' . $value['date'] . '</p>
                        </div>
                    </div>
                </div>
                <div class="display_none">';
        $id = $value['id'];
        $comment = $connect->query("SELECT * FROM `comment` WHERE id_post=$id AND `status` = 'Обработано'");
        $result_comment = $comment->fetchAll();
        foreach ($result_comment as $value_comment) {
            $id_user_comment = $value_comment['id_user'];
            $user_comment = $connect->query("SELECT * FROM `users` WHERE `id`=$id_user_comment");
            $result_user_comment = $user_comment->fetchAll();
            foreach ($result_user_comment as $value_user_comment) {
                echo '<div class="comment fix_inside">
                    <img class="ava_comment" src="' . $value_user['path_img'] . '' . $value_user['name_img'] . '" alt="">

                    <div class="form_comment">
                        <div class="between flex">
                            <div class="flex">
                                <p class="name_user">' . $value_user['login'] . '</p>';
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
                            <div class="icon flex">';
                            echo '</div>
                            <p>' . $value_comment['date'] . '</p>
                        </div>
                    </div>
                </div>';
        }
        echo '</div>
                <div class="add_comment_form fix_inside display_none">
                    <div class="form_create_comment">
                    ';
                    echo '
                        <textarea class="text_create_comment text" id="" rows="1"></textarea>
                        <img id="' . $value['id'] . '" class="ava_create_comment create_comment_btn" src="../img/comment.png" alt="">
                    </div>
                </div>
                </div>
                    ';
    }
} else if ($_GET['id'] == '0') {
    $query = $connect->query("SELECT * FROM `post` WHERE `status` = 'Обработано'");
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
                        <div class="icon flex">';
                            echo '<a class="show_comment show_comment_btn" >Показать коментарии</a>';
        if (!empty($_COOKIE['user'])) {
            echo '<a class="add_comment_btn">Оставить коментарий</a>';
        }
        echo '
                            </div>
                            <p>' . $value['date'] . '</p>
                        </div>
                    </div>
                </div>
                <div class="display_none">';
        $id = $value['id'];
        $comment = $connect->query("SELECT * FROM `comment` WHERE id_post=$id AND `status` = 'Обработано'");
        $result_comment = $comment->fetchAll();
        foreach ($result_comment as $value_comment) {
            $id_user_comment = $value_comment['id_user'];
            $user_comment = $connect->query("SELECT * FROM `users` WHERE `id`=$id_user_comment");
            $result_user_comment = $user_comment->fetchAll();
            foreach ($result_user_comment as $value_user_comment) {
                echo '<div class="comment fix_inside">
                    <img class="ava_comment" src="' . $value_user['path_img'] . '' . $value_user['name_img'] . '" alt="">

                    <div class="form_comment">
                        <div class="between flex">
                            <div class="flex">
                                <p class="name_user">' . $value_user['login'] . '</p>';
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
                            <div class="icon flex">';
                            echo'</div>
                            <p>' . $value_comment['date'] . '</p>
                        </div>
                    </div>
                </div>';
        }
        echo '</div>
                <div class="add_comment_form fix_inside display_none">
                    <div class="form_create_comment">
                    ';
                    echo '
                        <textarea class="text_create_comment text" id="" rows="1"></textarea>
                        <img id="' . $value['id'] . '" class="ava_create_comment create_comment_btn" src="../img/comment.png" alt="">
                    </div>
                </div>
                </div>
                    ';
    }
} else {
    $id = $_GET['id'];
    $query = $connect->query("SELECT * FROM `post` WHERE `status` = 'Обработано' AND id_cat=$id");
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
                        <div class="icon flex">';
                            echo'<a class="show_comment show_comment_btn" >Показать коментарии</a>';
        if (!empty($_COOKIE['user'])) {
            echo '<a class="add_comment_btn">Оставить коментарий</a>';
        }
        echo '
                            </div>
                            <p>' . $value['date'] . '</p>
                        </div>
                    </div>
                </div>
                <div class="display_none">';
        $id = $value['id'];
        $comment = $connect->query("SELECT * FROM `comment` WHERE id_post=$id AND `status` = 'Обработано'");
        $result_comment = $comment->fetchAll();
        foreach ($result_comment as $value_comment) {
            $id_user_comment = $value_comment['id_user'];
            $user_comment = $connect->query("SELECT * FROM `users` WHERE `id`=$id_user_comment");
            $result_user_comment = $user_comment->fetchAll();
            foreach ($result_user_comment as $value_user_comment) {
                echo '<div class="comment fix_inside">
                    <img class="ava_comment" src="' . $value_user['path_img'] . '' . $value_user['name_img'] . '" alt="">

                    <div class="form_comment">
                        <div class="between flex">
                            <div class="flex">
                                <p class="name_user">' . $value_user['login'] . '</p>';
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
                            <div class="icon flex">';
                            echo'</div>
                            <p>' . $value_comment['date'] . '</p>
                        </div>
                    </div>
                </div>';
        }
        echo '</div>
                <div class="add_comment_form fix_inside display_none">
                    <div class="form_create_comment">';
                        echo '<textarea class="text_create_comment text" id="" rows="1"></textarea>
                        <img id="' . $value['id'] . '" class="ava_create_comment create_comment_btn" src="../img/comment.png" alt="">
                    </div>
                </div>
                </div>
                    ';
    }
};
