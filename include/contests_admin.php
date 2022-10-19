<?php
require_once('dbconnect.php');
$title = $_POST['title'];
$end_date = $_POST['date'];
$name = $_FILES["photo_contests"]["name"];
$path = $_FILES["photo_contests"]["tmp_name"];
$start_date = date('Y-m-d');
$rand = rand();     // Создаем рандомную часть для имени rand()
$file_types = array('.png', '.jpg', '.jpeg');
$filenamefull = $rand . $name;
$filePath = '../img/';
if (file_exists($filePath) && in_array(mb_strstr($name, '.'), $file_types) && filesize($path) < 41943040) {
    move_uploaded_file($path, "$filePath/$filenamefull"); // ИСпользуем функцию move_uploaded_file(Путь файла,куда отправить)
    $query = $connect->prepare("INSERT INTO `contests`(`title`,`start_date`,`end_date`,`path_img`,`name_img`) VALUES (?,?,?,?,?)");
    $query->execute(array($title, $start_date, $end_date, $filePath, $filenamefull));
    echo '1';
}else{
    echo '0';
};
