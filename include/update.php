<?php
require_once('dbconnect.php');
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$login = $_POST['login'];
$tel = $_POST['tel'];
$user = $_COOKIE['user'];
$query = $connect->prepare("SELECT `email` FROM `users` WHERE email=:email");
$query->execute(['email' => $email]);
$result = $query->fetchAll();
if (empty($result)) {
    $updata = $connect->query("UPDATE `users` SET `full_name`='$full_name', `email`='$email', `login`='$login', `tel`='$tel' WHERE `id`='$user'");
    echo "0";
} else {
    echo "1";
}
