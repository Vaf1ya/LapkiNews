<?php
require_once('../include/dbconnect.php');
$id = $_POST['id'];
$text = $_POST['text'];
$date = date('Y-m-d');
$id_user = $_COOKIE['user'];
$query = $connect->prepare("INSERT INTO `comment` (`id_user`,`id_post`,`text`,`date`) VALUES (?,?,?,?)");
$query->execute(array($id_user, $id, $text, $date));
echo '1';
