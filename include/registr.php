<?php
require_once('dbconnect.php');
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$login = $_POST['login'];
$tel = $_POST['tel'];
$pass = md5($_POST['pass']);
$repeat_pass = $_POST['repeat_pass'];
$add = $_POST['add'];
$add_result = implode(",", $add);
$query = $connect->prepare("SELECT `email` FROM `users` WHERE email=:email");
$query->execute(['email' => $email]);
$result = $query->fetchAll();
if (empty($result)) {
    $query = $connect->prepare("INSERT INTO `users` (`full_name`,`email`,`login`,`tel`,`pass`,`cat`) VALUES (?,?,?,?,?,?)");
    $query->execute(array($full_name, $email, $login, $tel, $pass, $add_result));
    echo "0";
} else {
    echo "1";
}
