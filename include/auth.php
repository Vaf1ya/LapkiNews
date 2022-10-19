<?php
require_once('dbconnect.php');
$email = $_POST['email'];
$pass = trim(md5($_POST["pass"]));
$query = $connect->prepare("SELECT * FROM `users` WHERE email=:email AND pass=:pass");
$query->execute(['email' => $email, 'pass' => $pass]);
$result = $query->fetchAll();
if (!empty($result)) {
    foreach ($result as $value) {
        $id = $value['id'];
        $cat = $value['cat'];
        setcookie('user', $id, strtotime("+30 days"), '/');
    }
    echo "0";
} else {
    echo "1";
}
