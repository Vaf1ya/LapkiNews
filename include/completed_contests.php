<?php
require_once('dbconnect.php');
$id = $_POST['id'];
$query = $connect->prepare("SELECT * FROM `contests` WHERE id=:id");
$query->execute(['id' => $id]);
$result = $query->fetch();
$start_date = $result['start_date'];
$query_article = $connect->prepare("SELECT `id` FROM `articles` WHERE `date`=:date");
$query_article->execute(['date' => $start_date]);
$result_article = $query_article->fetchAll();
foreach ($result_article as $value_article) {
    $id_article = $value_article['id'];
    $query_likes = $connect->prepare("SELECT `id_user` FROM `likes` WHERE `id_article`=:id_article");
    $query_likes->execute(['id_article' => $id_article]);
    $result_likes = $query_likes->fetchAll();
    $rand = array_rand($result_likes, $num = 1);
    $user = $result_likes[$rand];
    $id_user = $user['id_user'];
    $query_winner = $connect->query("UPDATE `contests` SET `status`='Завершенное', `winner`='$id_user' WHERE id='$id'");
    echo '1';
}
