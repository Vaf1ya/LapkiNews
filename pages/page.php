<?php
require_once('header.php');
require_once('../include/dbconnect.php');
$id = $_GET['id'];
$query = $connect->query("SELECT * FROM `articles` WHERE `id`='$id'");
$result = $query->fetchAll();
foreach ($result as $value) {
    $views = $value['views'];
    $new_views = $views + 1;
    $updata = $connect->query("UPDATE `articles` SET `views`='$new_views' WHERE id='$id'");
}
?>
<link rel="stylesheet" href="../css/article.css">
<link rel="stylesheet" href="../css/about.css">
<main class="indent">

    <div class="header_article fix">
        <p><a href="../index.php">Главная</a>>Статьи</p>
        <h1>Статьи</h1>
    </div>

    <div class="picture_title flex">
        <?php
        $id = $_GET['id'];
        $query = $connect->query("SELECT * FROM `articles` WHERE `id`='$id'");
        $result = $query->fetchAll();
        foreach ($result as $value) {
            echo '
            <div class="about_div title">
            <h2>' . $value['title'] . '</h2><br>
            <div class="data between flex">
                <p>' . $value['date'] . '</p><p>
            ';
            $id_cat = $value['id_cat'];
            $cat = explode(",", $id_cat);
            foreach ($cat as $value_cat) {
                $category = $connect->query("SELECT * FROM `categories` WHERE `id`=$value_cat ");
                $result_cat = $category->fetchAll();
                foreach ($result_cat as $value_category) {
                    echo ' #' . $value_category['title'];
                };
            };
            echo '
            </p>
            <div class="icon flex" >
                <input id="like_form" type="hidden" name="name" value="' . $value['id'] . '">';
            $id_user = $_COOKIE['user'];
            $id = $value['id'];
            $query = $connect->prepare("SELECT * FROM `likes` WHERE id_user=:id_user AND id_article=:id");
            $query->execute(['id_user' => $id_user, 'id' => $id]);
            $result = $query->fetchAll();
            if (empty($result)) {
                echo '<svg id="like" height="26px" version="1.1" viewBox="0 0 512 512">
                <g id="_x31_66_x2C__Heart_x2C__Love_x2C__Like_x2C__Twitter">
                    <g>
                        <path id="fill_on" class="fill_on" d="M365.4,59.628c60.56,0,109.6,49.03,109.6,109.47c0,109.47-109.6,171.8-219.06,281.271    C146.47,340.898,37,278.568,37,169.099c0-60.44,49.04-109.47,109.47-109.47c54.73,0,82.1,27.37,109.47,82.1    C283.3,86.999,310.67,59.628,365.4,59.628z" />
                    </g>
                </g>
            </svg>';
            } else {
                echo '<svg id="like" height="26px" version="1.1" viewBox="0 0 512 512">
                <g id="_x31_66_x2C__Heart_x2C__Love_x2C__Like_x2C__Twitter"> 
                    <g>
                        <path id="fill_on" class="fill_off" d="M365.4,59.628c60.56,0,109.6,49.03,109.6,109.47c0,109.47-109.6,171.8-219.06,281.271    C146.47,340.898,37,278.568,37,169.099c0-60.44,49.04-109.47,109.47-109.47c54.73,0,82.1,27.37,109.47,82.1    C283.3,86.999,310.67,59.628,365.4,59.628z" />
                    </g>
                </g>
            </svg>';
            }
            echo '<p id="likes">' . $value['likes'] . '</p>
            </div>
            </div></div>
            <div class="about_div">
                <img class="article_img" src="' . $value['path_img'] . '' . $value['name_img'] . '" alt="">
            </div>
            ';
        };
        ?>
    </div>
    <hr class="fix">
    <div class="fix_inside">
        <h2>Содержание</h2>
        <hr>
    </div>

    <ol class="fix">
        <?php
        $id = $_GET['id'];
        $query = $connect->query("SELECT * FROM `chapters` WHERE `id_articles`='$id'");
        $result = $query->fetchAll();
        foreach ($result as $value) {
            echo '
            <li>
            <h3>' . $value['chapters'] . '</h3>
            </li>
            ';
        }
        ?>
    </ol>
    <?php
    $id = $_GET['id'];
    $query = $connect->query("SELECT * FROM `chapters` WHERE `id_articles`='$id'");
    $result = $query->fetchAll();
    foreach ($result as $value) {
        echo '
        <div class="fix_inside">
            <h2>' . $value['chapters'] . '</h2>
            <hr>
        </div>

        <p class="text_about fix">
            ' . $value['text'] . '
        </p>
        ';
    }
    ?>

</main>
<section class="mission">
    <h2>«Наша миссия — объединить всех, кто неравнодушен к домашним питомцам, кто хочет делиться своим опытом и получать новые знания. Создавать культуру взаимоотношений между людьми и их питомцами».</h2>
</section>
<script src="../script/like.js"></script>
<?php
require_once('footer.php');
?>