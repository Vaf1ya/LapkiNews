<?php
require_once('dbconnect.php');
$add = $_POST['add'];
$add_result = implode(",", $add);
$user = $_COOKIE['user'];
$updata = $connect->query("UPDATE `users` SET `cat`='$add_result' WHERE `id`='$user'");
echo '0';
