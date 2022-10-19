<?php
require_once('dbconnect.php');
$id = $_POST['id'];
$like = $_POST['like'];
if (!empty($_COOKIE['user'])) {
    $id_user = $_COOKIE['user'];
    $query = $connect->prepare("SELECT * FROM `likes_post` WHERE id_user=:id_user AND id_post=:id");
    $query->execute(['id_user' => $id_user, 'id' => $id]);
    $result = $query->fetchAll();
    if (empty($result)) {
        $likes = $connect->prepare("INSERT INTO `likes_post`(`id_user`,`id_post`) VALUES  (?,?)");
        $likes->execute(array($id_user, $id));
        $likes_update = $like + 1;
        $post = $connect->query("UPDATE `post` SET `likes` = '$likes_update' WHERE id='$id'");
        echo json_encode(['1', $id]);
    } else {
        $query = $connect->prepare("DELETE FROM `likes_post`  WHERE id_user=:id_user AND id_post=:id");
        $query->execute(array($id_user, $id));
        $likes_update = $like - 1;
        $article = $connect->query("UPDATE `post` SET `likes` = '$likes_update' WHERE id='$id'");
        echo json_encode(['0', $id]);
    }
} else {
    echo '2';
};
