<?php
require_once('dbconnect.php');
$text_review = $_POST['text_review'];
$user = $_COOKIE['user'];
$status = 'Новое';
$query = $connect->prepare("INSERT INTO `review` (`id_user`,`text`, `status`) VALUES (?,?,?)");
$query->execute(array($user, $text_review, $status));
echo '0';
