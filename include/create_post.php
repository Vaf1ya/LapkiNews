<?php
require_once('dbconnect.php');
$text = $_POST['text'];
$add = $_POST['add'];
$addTypes = $_POST['addTypes'];
$add_result = implode(",", $add);
$addTypes_result = implode(",", $addTypes);
$id_user = $_COOKIE['user'];
$date = date('Y-m-d');
$query = $connect->prepare("INSERT INTO `post` (`id_user`,`id_cat`,`id_types`,`date`,`text`) VALUES (?,?,?,?,?)");
$query->execute(array($id_user, $add_result, $addTypes_result, $date, $text));
echo "1";
