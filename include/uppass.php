<?php
require_once('dbconnect.php');
$new_pass = md5($_POST['new_pass']);
$pass = md5($_POST['pass']);
$user = $_COOKIE['user'];
$query = $connect->query("SELECT * FROM `users` WHERE id=$user");
$result = $query->fetchAll();
foreach ($result as $value) {
    $old_pass = $value['pass'];
    if ($old_pass == $pass) {
        $uppass = $connect->query("UPDATE `users` SET `pass`='$new_pass' WHERE `id`='$user'");
        echo "0";
    } else {
        echo "1";
    };
};
