<?php
require_once('dbconnect.php');
$id = $_COOKIE['user'];
$name = $_FILES["photo"]["name"];
$path = $_FILES["photo"]["tmp_name"];
$rand = rand();     // Создаем рандомную часть для имени rand()
$file_types = array('.png', '.jpg', '.jpeg');
$filenamefull = $rand . $name;
$filePath = '../img/';
if (file_exists($filePath) && in_array(mb_strstr($name, '.'), $file_types) && filesize($path) < 41943040) {
    move_uploaded_file($path, "$filePath/$filenamefull"); // ИСпользуем функцию move_uploaded_file(Путь файла,куда отправить)
    $query = $connect->query("UPDATE `users` SET `path_img`='$filePath', `name_img`='$filenamefull' WHERE id='$id'");
    echo '1';
} else {
    echo '0';
};
