<?php
require_once('dbconnect.php');
if ($_GET['id'] == '0' && $_GET['idtype'] > 0) {
    $idtype = $_GET['idtype'];
    $query = $connect->prepare("SELECT * FROM `articles` WHERE id_type=:idtype");
    $query->execute(['idtype' => $idtype]);
    $result = $query->fetchAll();
    foreach ($result as $value) {
        echo '
        <a href="../pages/page.php?id=' . $value['id'] . '">
                <div class="article">
                    <img class="article_logo" src="' . $value['path_img'] . '' . $value['name_img'] . '" alt="">
                    <h3>' . $value['title'] . '</h3>
                    <div class="date flex between">
                        <p>
                        ' . $value['date'] . '
                        </p>
                        <div class="icon flex"><img src="../img/views.png" alt="">
                            <p>' . $value['views'] . '</p>
                        </div>
                        <div class="icon flex"><img src="../img/like.png" alt="">
                            <p>' . $value['likes'] . '</p>
                        </div>
                    </div><br>
                </div>
            </a>';
    };
} else if ($_GET['idtype'] > 0) {
    $idtype = $_GET['idtype'];
    $id = $_GET['id'];
    $query = $connect->prepare("SELECT * FROM `articles` WHERE id_cat=:id AND id_type=:idtype");
    $query->execute(['id' => $id, 'idtype' => $idtype]);
    $result = $query->fetchAll();
    foreach ($result as $value) {
        echo '
        <a href="../pages/page.php?id=' . $value['id'] . '">
                <div class="article">
                    <img class="article_logo" src="' . $value['path_img'] . '' . $value['name_img'] . '" alt="">
                    <h3>' . $value['title'] . '</h3>
                    <div class="date flex between">
                        <p>
                        ' . $value['date'] . '
                        </p>
                        <div class="icon flex"><img src="../img/views.png" alt="">
                            <p>' . $value['views'] . '</p>
                        </div>
                        <div class="icon flex"><img src="../img/like.png" alt="">
                            <p>' . $value['likes'] . '</p>
                        </div>
                    </div><br>
                </div>
            </a>';
    };
} else if ($_GET['id'] == '0') {
    $query = $connect->query("SELECT * FROM `articles`");
    $result = $query->fetchAll();
    foreach ($result as $value) {
        echo '
        <a href="../pages/page.php?id=' . $value['id'] . '">
                <div class="article">
                    <img class="article_logo" src="' . $value['path_img'] . '' . $value['name_img'] . '" alt="">
                    <h3>' . $value['title'] . '</h3>
                    <div class="date flex between">
                        <p>
                        ' . $value['date'] . '
                        </p>
                        <div class="icon flex"><img src="../img/views.png" alt="">
                            <p>' . $value['views'] . '</p>
                        </div>
                        <div class="icon flex"><img src="../img/like.png" alt="">
                            <p>' . $value['likes'] . '</p>
                        </div>
                    </div><br>
                </div>
            </a>';
    };
} else {
    $id = $_GET['id'];
    $query = $connect->prepare("SELECT * FROM `articles` WHERE id_cat=:id");
    $query->execute(['id' => $id]);
    $result = $query->fetchAll();
    foreach ($result as $value) {
        echo '
        <a href="../pages/page.php?id=' . $value['id'] . '">
                <div class="article">
                    <img class="article_logo" src="' . $value['path_img'] . '' . $value['name_img'] . '" alt="">
                    <h3>' . $value['title'] . '</h3>
                    <div class="date flex between">
                        <p>
                        ' . $value['date'] . '
                        </p>
                        <div class="icon flex"><img src="../img/views.png" alt="">
                            <p>' . $value['views'] . '</p>
                        </div>
                        <div class="icon flex"><img src="../img/like.png" alt="">
                            <p>' . $value['likes'] . '</p>
                        </div>
                    </div><br>
                </div>
            </a>';
    };
};
