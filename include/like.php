<?php
require_once('dbconnect.php');
$id = $_POST['id'];
$likes = $_POST['likes'];
if (!empty($_COOKIE['user'])) {
    $id_user = $_COOKIE['user'];
    $query = $connect->prepare("SELECT * FROM `likes` WHERE id_user=:id_user AND id_article=:id");
    $query->execute(['id_user' => $id_user, 'id' => $id]);
    $result = $query->fetchAll();
    if (empty($result)) {
        $likes = $connect->prepare("INSERT INTO `likes`(`id_user`,`id_article`) VALUES  (?,?)");
        $likes->execute(array($id_user, $id));
        $articles = $connect->prepare("SELECT * FROM `articles` WHERE id=:id");
        $articles->execute(['id' => $id]);
        $result_articles = $articles->fetchAll();
        foreach ($result_articles as $value_articles) {
            $likes = $value_articles['likes'];
            $likes_update = $likes + 1;
            $article = $connect->query("UPDATE `articles` SET `likes` = '$likes_update' WHERE id='$id'");
            echo '1';
        }
    } else {
        $query = $connect->prepare("DELETE FROM `likes`  WHERE id_user=:id_user AND id_article=:id");
        $query->execute(array($id_user, $id));
        $articles = $connect->prepare("SELECT * FROM `articles` WHERE id=:id");
        $articles->execute(['id' => $id]);
        $result_articles = $articles->fetchAll();
        foreach ($result_articles as $value_articles) {
            $likes = $value_articles['likes'];
            $likes_update = $likes - 1;
            $article = $connect->query("UPDATE `articles` SET `likes` = '$likes_update' WHERE id='$id'");
            echo '0';
        }
    }
} else {
    echo '2';
};
